select *
   from banners b join offers o on b.offer_id = o.id
   where (date_format(b.start_date, "%Y-%m-%d") < date(o.start_date) or date_format(b.end_date, "%Y-%m-%d") > date(o.end_date));


update banners b join offers o on b.offer_id = o.id
    set b.start_date = o.start_date, b.end_date = o.end_date
    where (date_format(b.start_date, "%Y-%m-%d") < date(o.start_date) or date_format(b.end_date, "%Y-%m-%d") > date(o.end_date));

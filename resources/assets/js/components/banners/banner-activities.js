Vue.component('banner-activities', {
    props: ['resourceId'],

    data() {
        return {
            activities: {},
            resourceId: ''

        }
    },

    attached() {
        this.getActivities();
    },


    methods: {
        getActivities() {
            this.$http.get(`/banner-activities/${this.resourceId}`)
                .then(response => {
                    this.activities = response.data;
                    this.addTimeElapsed(this.activities);
                    this.animateActivityListOnHash();
                });
        },


        addTimeElapsed(activities) {
           this.activities = _.map(activities, function(activity) {
                                    let time_elapsed = moment(activity.timestamp.date).fromNow();
                                    return {
                                        action: activity.action,
                                        pretty_date: activity.pretty_date,
                                        timestamp: activity.timestamp,
                                        type: activity.type,
                                        user: activity.user,
                                        time_elapsed: time_elapsed
                                    }
                                });
        },

        toggleShareLink(index, hover) {
            if (hover) {
                $('.banner-activity-share-'+index).show();
            } else {
                $('.banner-activity-share-'+index).hide();
            }

        },

        copyShareLink(index) {
            var hostName = window.location.hostname,
                link = 'https://'+hostName+`/banner/${this.resourceId}/#banner-activity-${index}`,

                temp = $("<input>");

                $("body").append(temp);

                temp.val(link).select();

                document.execCommand("copy");

                temp.remove();

                $(".overlay").css("opacity",0.6).fadeIn(300, function () {
                    $('.copied').css({'position':'absolute','z-index':9999, 'display':'block'});
                });

                setTimeout( function(){
                    $(".overlay").css("opacity",0.6).fadeOut(300, function () {
                        $('.copied').css({'position':'absolute','z-index':9999, 'display':'none'});
                    });
                 }, 600);
        },

        animateActivityListOnHash() {
            if (window.location.hash) {
                var activityList = $('div.banner-activity-list'),
                    checkExist = setInterval(function() {
                        if ($('.' + window.location.hash.substr(1)).length) {
                            clearInterval(checkExist);
                            var hash = window.location.hash.substr(1),
                                scrollTo = $('.' + hash);

                            activityList.animate({
                                scrollTop: scrollTo.offset().top - activityList.offset().top + activityList.scrollTop()
                            });

                            $('li.'+window.location.hash.substr(1)+'-li')
                                .hide()
                                .delay()
                                .fadeIn()
                                .fadeOut(100)
                                .fadeIn()
                                .fadeOut(100)
                                .fadeIn()
                                .fadeOut(100)
                                .fadeIn();
                        }
                    }, 100);
            }
        }


    }
});

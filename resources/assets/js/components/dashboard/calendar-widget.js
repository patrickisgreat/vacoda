Vue.component('calendar-widget', {
    /**
     * The component's properties.
     */
    props: {
        team: {}
    },

    ready()  {
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                defaultView: 'listDay',
                displayEventTime: false,

                header: {
                    left: '',
                    center: 'prev title next',
                    right: ''
                },
                eventSources: [
                    {
                        url: '/api/banner/',
                        headers: {
                            'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN'),
                        },
                        eventDataTransform(banner) {
                            return {
                                title: banner.name,
                                start: banner.start_date,
                                end: banner.end_date,
                                url: `/banner/${banner.id}/`,
                                backgroundColor: '#FECC52',
                            };
                        },
                    },

                    {
                        url: '/api/offer/',
                        headers: {
                            'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN'),
                        },
                        eventDataTransform(offer) {
                            return {
                                title: offer.name,
                                start: offer.start_date,
                                end: offer.end_date,
                                url: `/offer/${offer.id}/`,
                                backgroundColor: '#f57d27',
                            };
                        },
                    },
                ]

            });
        });
    },

});
Vue.component('banner-show', {
    mixins: [
        require('../api-resource'),
    ],

    /**
     * The component's data.
     */
    init() {
        $("body").addClass("create-banner-body");
    },

    data() {
        return {
            form: new SparkForm({
                // details
                name: '',
                description: '',
                offer_id: '',
                start_date: '',
                end_date: '',

                // categories
                categories: [],
                campaign: '',

                // template
                template_id: null,

                // theme
                theme_id: null,

                // contents
                headline: '',
                headline_font_size: 36,
                // sub_headline: '',
                body: '',
                body_font_size: 12,
                cta: '',
                url: '',
                // disclaimer: '',
                legal_copy: '',
                image_alt: '',
                status: '',
                compiled_html: '',

                image_path: '',
                export_image: '',
                deleted_at: null,
            }),

            template: {},
            theme: {},
            offerNameString: {},
            hasNewImage: false,

            //drag and drop detection
            droppedFiles: false,

            //scaling the banner preview
            desktopScaleRatio: 1,
            mobileScaleRatio: 1,
            canEditApproved: false,
            canEditBanner: false,
            permissionRoute: '/api/permission',
            previewDesktopHeight: '',
            previewMobileHeight: '',

            //toggling the 'edit' and 'read-only' views
            staticView: null,
            canEditPending: false,
            showEditButton: false,

            //deny message
            denyMessage: null,
            updated: false,

            selectedCategoryString: '',
        };
    },

    computed: {
        resourceUri() {
            return `/api/banner/${this.resourceId || ''}`;
        },

        activeDates() {
            if (this.form.start_date !== "" && this.form.end_date !== "") {
                return this.form.start_date.split(' ')[0] + ' - ' + this.form.end_date.split(' ')[0];
            }
        },

        bannerName() {
            return this.offerNameString.name
        },

        progressBar() {
            var requiredFields = [
                this.form.name,
                this.form.offer_id,
                this.form.start_date,
                this.form.end_date,
                this.form.template_id,
                this.form.url,
                this.form.categories,
            ];

            if (this.template.is_image === 1) {
                requiredFields.push(this.form.image_path);
                requiredFields.push(this.form.image_alt);
            } else {
                requiredFields.push(this.form.headline);

                if (this.template.has_themes === 1) {
                    requiredFields.push(this.form.theme_id);
                }
            }

            var requiredLength = 0;
            var requiredValues = 0;

            $.each(requiredFields, function (index, value) {
                requiredLength++;

                if (value) {
                    if (value.length > 0) {
                        requiredValues++;
                    } else if (typeof value === 'number') {
                        requiredValues++;
                    }
                }
            });

            return Math.round((requiredValues / requiredLength) * 100) + '%';
        },

        displayScaleMobile() {
            return Math.round(this.mobileScaleRatio * 100) + '%';
        },

        displayScaleDesktop() {
            return Math.round(this.desktopScaleRatio * 100) + '%';
        },

        showEditButton() {
            let vue = this;

            // hide button if banner is archived
            if (vue.form.deleted_at) {
                return false;
            }

            if (vue.form.status !== 'Denied' && vue.form.status !== 'Approved') {
                //if user can update regular pending banner
                if (vue.$get('canEditPending')) {
                    return true;
                }
            }

            if (vue.form.status !== 'Pending' && vue.form.status !== 'Denied') {
                //if user can update approved banner
                if (vue.$get('canEditApproved')) {
                    return true;
                }
            }
        },

    },

    created() {
        //
    },

    methods: {

        initPositioning() {
            //position the banner show container based on the previews
            var vue = this;
            vue.$mobilePreview = $('.preview-mobile');
            vue.$desktopPrevContainer = $('div.desktop.preview-container');
            vue.$mobilePrevContainer = $('.preview-mobile.preview-container');
            vue.$previewPanes = $('.preview-panes');

            var $previewContainer = $('.preview-container'),
                $bottom = vue.$previewPanes.position().top + vue.$previewPanes.outerHeight(true),
                $detailsPane = $('div.details-col.sidebar-nav-fixed'),
                $bannerShowContainer = $('.create-banner-body > #spark-app > .container'),
                $sidebarNav = $('div.banner-navigation.sidebar-nav-fixed'),
                $windowWidth = $(window).width();


            $(window).resize( function(){
                //on resize adjust details pane
                $windowWidth = $(window).width();
                vue.adjustDetailsPane($windowWidth, $detailsPane, $bottom);
            });

            //on load adjust details pane
            vue.adjustDetailsPane($windowWidth, $detailsPane, $bottom);

            vue.resizeBannerContainers(vue.$desktopPrevContainer, vue.$mobilePrevContainer)

            //vue.getTemplateHeight();

            //other adjustments
            $bannerShowContainer.css('margin-top', $bottom-40);
            $sidebarNav.css('top', $bottom+80);
        },

        // maybe later
        // getTemplateHeight() {
        //     var vue = this;
        //         var checkExist = setInterval(function() {
        //             console.log($('div.desktop.preview-container').height());
        //             if ($('div.desktop.preview-container table.banner-html').length > 0 && $('div.desktop.preview-container table.banner-html').height > 0) {
        //                 console.log($("div.desktop.preview-container").height());
        //                 var $templateHeight = $("div.desktop.preview-container table.banner-html").height();
        //                 console.log($templateHeight);
        //                 //vue.resizeBannerContainers(vue.$desktopPrevContainer, vue.$mobilePrevContainer, $templateHeight);
        //                 vue.$previewPanes.css('height', $templateHeight+60);
        //                 clearInterval(checkExist);
        //             }
        //         }, 100);
        // },

        resizeBannerContainers($desktopPrevContainer, $mobilePrevContainer) {
            //if 362 with or without CTA
            if (typeof this.template !== "undefined" && typeof this.template.name !== "undefined") {
                if (this.template.name.includes('362px')) {
                    this.setHeights($desktopPrevContainer, $mobilePrevContainer, true);
                    return true;
                 }
                 else {
                    this.setHeights($desktopPrevContainer, $mobilePrevContainer);
                    return true;
                }

            }
            return false;
        },

        adjustDetailsPane($windowWidth, $detailsPane, $bottom) {
            if ($windowWidth < 1129) {
                $detailsPane.css('top', $bottom - 100);
            } else {
                $detailsPane.css('top', $bottom + 70);
            }
        },

        setHeights($desktopPrevContainer, $mobilePrevContainer, threeSixtyTwo=false) {
            if (threeSixtyTwo) {
                console.log('362 true');
                //$('.banner-static-blade').css("margin-top", "80px");
                $('.preview-desktop').css({
                    "height": 224,
                    "overflow": "hidden"
                });
                $('.preview-mobile').css({
                    "height": 224,
                    "max-height" : 224,
                    "overflow": "hidden"
                });
            }
            else {
                //$('.banner-static-blade').css("margin-top", "");
                $('.preview-desktop').css({"height": "",
                    "overflow": "",
                    "max-height" : ""
                });
                $('.preview-mobile').css({"height": "",
                    "overflow": "",
                    "max-height" : ""
                });
            }
            // $desktopPreview.css("height", desktop);
            // $mobilePreview.css("height", mobile);
            //$desktopPrevContainer.css("height", $templateHeight+2);
            //$mobilePrevContainer.css("height", $templateHeight+2);
        },

        initDropZonePlace() {
            var vue = this;
            jQuery.event.props.push('dataTransfer');
            // feature detection for drag&drop upload

            var isAdvancedUpload = function () {
                var div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
            }();

            // Applying drag and drop zone to DOM
            $('.box').each(function () {
                var $form = $('.box'),
                    $input = $form.find('input[type="file"]'),
                    $label = $form.find('label'),
                    $errorMsg = $form.find('.box__error span'),
                    $restart = $form.find('.box__restart'),
                    droppedFiles = false,
                    showFiles = function (files) {
                        $label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
                    };

                // automatically submit the form on file select
                $input.on('change', function (e) {
                    showFiles(e.target.files);
                });

                // drag&drop files if the feature is available
                if (isAdvancedUpload) {
                    $form
                        .addClass('has-advanced-upload') // letting the CSS part to know drag&drop is supported by the browser
                        .on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                            // preventing the unwanted behaviours
                            e.preventDefault();
                            e.stopPropagation();
                        })
                        .on('dragover dragenter', function () //
                        {
                            $form.addClass('is-dragover');
                        })
                        .on('dragleave dragend drop', function () {
                            $form.removeClass('is-dragover');
                        })
                        .on('drop', function (e) {
                            droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
                            showFiles(droppedFiles);
                            vue.hasNewImage = true;
                            this.hasNewImage = true;

                            {
                                if (droppedFiles) ;
                                vue.droppedFiles = true;
                                var ajaxData = new FormData($form.get(0));
                                var myFileReader = new FileReader();
                                var droppedImageSrc;
                                $.each(droppedFiles, function (i, file)
                                    //generating image in banner preview section
                                {
                                    ajaxData.append($input.attr('name'), file);
                                    var myFile = file;
                                    myFileReader.addEventListener("load", function assignImageSrc(evt) {
                                        this.removeEventListener("load", assignImageSrc);
                                        vue.form.image_path = evt.target.result;
                                    }, false);

                                    myFileReader.readAsDataURL(myFile);

                                });
                            }
                        });
                }

            });
        },

        initStaticView() {
            if (this.resourceId) {
                return this.staticView = true;
            }
        },

        toggleStaticView() {
            this.initPositioning();
            $('#offer_id').change();
            return this.staticView = null;
        },

        initSelectMenu() {
            var vue = this;
            $(".theme-selection select").selectpicker({
                dropupAuto: false,
                size: 5
            });

            //Scaling down the preview after theme has been selected and rendered in preview, will re-factor later in array-select.js
            $('.theme-selection select').on('refreshed.bs.select', function (e) {
                vue.initPositioning();
                setTimeout(function () {
                    //if the template is not 362 scale it
                    if (typeof vue.template.name != "undefined" && !vue.template.name.includes('362px')) {
                        //here we need to change the height of the previews container based on scaling
                        vue.scalePreview();
                    }
                }, 500);
            });
        },

        /**
         * looks for mso comments in the banner html and replaces
         * theme strings in brackets
         */
        handleOutlookComments() {
            let vue = this;
            $('table.banner-html tr').each(function () {
                $(this).find('td').each(function () {
                    _.each($(this).contents(), function (el) {
                        if (el.nodeType === 8 && el.nodeValue.includes('{{ theme.font_color }}')) {
                            el.nodeValue = el.nodeValue.replace('{{ theme.font_color }}', vue.theme.font_color);
                        }

                        if (el.nodeType === 8 && el.nodeValue.includes('{{ theme.cta_font_color }}')) {
                            el.nodeValue = el.nodeValue.replace('{{ theme.cta_font_color }}', vue.theme.cta_font_color);
                        }

                        if (el.nodeType === 8 && el.nodeValue.includes('{{fields.id}}')) {
                            el.nodeValue = el.nodeValue.replace('{{fields.id}}', vue.resourceId);
                        }
                    });
                });
            });
        },

        checkPermission(permission) {
            let vue = this;
            vue.$http.get(vue.permissionRoute + '/' + permission)
                .then(response => {
                    console.log('response');
                    console.log(response);

                    if (permission === "edit_approved_banner" && response.status === 200) {
                        vue.$set('canEditApproved', true);
                    }

                    if (permission === "approve_banner" && response.status === 200) {
                        vue.$set('canEditApproved', true);
                    }

                    if (permission === "update_banner" && response.status === 200) {
                        vue.$set('canEditApproved', true);
                        vue.$set('canEditPending', true);
                    }
                });
        },

        initDateTimePickers() {
            let icons = {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            };

            $('#datetimepicker1').datetimepicker({
                format: 'MM/DD/YYYY', //Uncomment for time picker: 'YYYY-MM-DD HH:mm:ss',
                icons: icons
            });

            $('#datetimepicker2').datetimepicker({
                format: 'MM/DD/YYYY', //Uncomment for time picker: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false, //Important! https://github.com/Eonasdan/bootstrap-datetimepicker/issues/1075
                icons: icons
            });

            $("#datetimepicker1").on("dp.change", function (e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
            });

            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });
        },

        /**
         * Save banner.
         */
        save() {
            let vue = this;
            return new Promise((resolve, reject) => {
                if (vue.resourceId && vue.hasNewImage || vue.resourceId && vue.form.status == "Approved") {
                    vue.beforeUpdate().then(result => {
                        vue.update();
                        resolve(resolve);
                    }).catch(result => {
                        reject(result);
                        return;
                    });
                } else if (vue.resourceId && vue.form.status != "Approved") {
                    vue.update();
                    vue.updated = true;
                    resolve();
                } else {
                    vue.create();
                    resolve();
                }
            });
        },

        formatDate(date) {
            return moment(date).format("YYYY-MM-DD");
        },

        /**
         * Send the form to the back-end server.
         *
         * This function will clear old errors, update "busy" status, etc.
         */
        approvePromise() {
            let vue = this
            return new Promise((resolve, reject) => {
                vue.handleOutlookComments();
                vue.form.compiled_html = $("<div />").append($(".banner-preview-modal .preview-desktop .banner-html").clone()).html();
                vue.form.status = 'Processing';
                vue.save().done(function () {
                    if (vue.updated === true) {
                        resolve(true);
                    } else {
                        reject('there was errors');
                    }
                });
            });
        },

        /**
         * Compile banner and approves it for ET sync.
         */
        approve() {
            let vue = this;
            vue.approvePromise()
                .then(function (resolved) {
                    swal({
                        title: "Banner Approved!",
                        text: "Banner '" + vue.form.name + "' has been approved and will be uploaded to Salesforce Marketing Cloud shortly. This process usually takes less than 5 minutes.",
                        type: "success",
                        confirmButtonText: "Ok"
                    }, function () {
                        location.reload();
                    });
                })
                .catch(errors => {
                    console.log(errors);
                })
        },

        /**
         * Compile banner and approves it for ET sync.
         */
        deny() {
            this.form.status = 'Denied';
            this.save();
        },

        copy() {
            this.resourceId = null;
            this.resourceUri = '/api/banner/';
            this.form.name = `[COPY] ${this.form.name}`;
            this.form.status = 'Draft';
            this.form.compiled_html = null;
            this.form.image_path = null;
            this.hasNewImage = false;
            this.droppedFiles = false;

            window.history.pushState("", "", '/banner/');
            window.scrollTo(0, 0);
            this.toggleStaticView();
        },

        /**
         * Update banner preview with chosen image.
         */

        handleImageChange(reader, file, event) {
            let vue = this,
                input = vue.$refs.image;

            if (input.files && input.files[0]) {
                // use FileReader API to preview image before upload
                // https://developer.mozilla.org/en-US/docs/Web/API/FileReader
                this.droppedFiles = false;
                let reader = new FileReader();

                reader.onload = function (e) {
                    vue.form.image_path = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }

            vue.hasNewImage = true;
            this.hasNewImage = true;
            //move stuff if stuff has moved
            vue.initPositioning();

            console.log(typeof vue.template.name);
            if (typeof vue.template.name != "undefined" && !vue.template.name.includes('362px')) {
                vue.scalePreview();
            }
        },


        /**
         * Uploads a banner image.
         */
        handleImageUpload: function (id) {
            let vue = this;
            return new Promise((resolve, reject) => {
                // use FormData API to upload image via AJAX
                // https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects

                // if file is dropped, convert the image_path file uri to a blob and post that to server
                if (this.droppedFiles) {
                    var mimeString;

                    function dataURItoBlob(dataURI) {
                        // convert base64/URLEncoded data component to raw binary data held in a string
                        var byteString;
                        if (dataURI.split(',')[0].indexOf('base64') >= 0)
                            byteString = atob(dataURI.split(',')[1]);
                        else
                            byteString = unescape(dataURI.split(',')[1]);
                        // separate out the mime component
                        mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
                        // write the bytes of the string to a typed array
                        var ia = new Uint8Array(byteString.length);
                        for (var i = 0; i < byteString.length; i++) {
                            ia[i] = byteString.charCodeAt(i);
                        }
                        return new Blob([ia], {type: mimeString, endings: 'native'});
                    }

                    var blob = dataURItoBlob(this.form.image_path);
                    var n = mimeString.lastIndexOf('/');
                    var fileTypeString = mimeString.substring(n).replace(/\//g, '');

                    function blobToFile(theBlob, fileName) {
                        //A Blob() is almost a File() - it's just missing the two properties below which we will add
                        theBlob.lastModifiedDate = new Date();
                        theBlob.name = fileName;
                        return theBlob;
                    }

                    var myFile = blobToFile(blob, "bnr-image001x." + fileTypeString);
                    var data = new FormData();

                    data.append('image', myFile, "bnr-image001x." + fileTypeString);
                    vue.$http.post(`/api/banner/${vue.resourceId}/image`, data)
                        .then(response => {
                            if (response.data.uploaded === 'true') {
                                //to make sure the banner image is the path and not binary
                                location.assign('/banner/' + vue.resourceId);
                                vue.uploaded = true;
                                resolve();
                                return vue.uploaded;
                            } else if (response) {
                                vue.handleErrors(response);
                                vue.uploaded = false;
                                reject();
                                return vue.uploaded;
                            }
                        })
                        .catch(function (response) {
                            vue.handleErrors(response);
                            vue.uploaded = false;
                            reject();
                            return vue.uploaded;
                        });
                }

                //If files are already detected, post as usual
                else {
                    var data = new FormData();
                    data.append('image', vue.$refs.image.files[0]);
                    vue.$http.post(`/api/banner/${vue.resourceId}/image`, data)
                        .then(response => {
                            if (response.data.uploaded === 'true') {
                                vue.uploaded = true;
                                resolve(response.data);
                                return vue.uploaded;
                            } else {
                                vue.uploaded = false;
                                this.handleErrors(response);
                                reject(response.data);
                                return vue.uploaded;
                            }
                        })
                        .catch(function (response) {
                            vue.uploaded = false;
                            this.handleErrors(response);
                            reject(response.data);
                        });
                }
            });
        },


        /**
         * Called after the resource is retrieved.
         */
        getResourceSuccess(response) {
            let vue = this;

            _.each(response, function (value, key) {
                if (key == "start_date" || key == 'end_date') {
                    value = vue.formatDate(value);
                }
                vue.form[key] = value;
            });
            //checkPermissions after values are set
            if (vue.form.status === "Approved") {
                vue.checkPermission('edit_approved_banner');
            }

            if (vue.form.status != "Approved") {
                vue.checkPermission('approve_banner');
                vue.checkPermission('update_banner');

            }

            if (response.banner_image && !_.isEmpty(response.banner_image)) {
                vue.form.image_path = `/uploads/banner-images/${response.banner_image.name}`;
            }
        },

        scalePreview() {
            var vue = this;
            console.log(typeof vue.template.name);
            vue.initPositioning();
            if (typeof vue.template.name != "undefined" && vue.template.name.includes('362px')) {
                return;
            }
            //Desktop scaling
            this.previewDesktopHeight = $("#previews .preview-desktop .banner-html").height();
            if (this.previewDesktopHeight > 169) {
                this.desktopScaleRatio = (169 / this.previewDesktopHeight).toFixed(2);
            } else {
                this.desktopScaleRatio = 1;
            }
            $("#previews .preview-desktop .banner-html").css('transform', 'scale(' + this.desktopScaleRatio + ')');

            //Mobile scaling
            this.previewMobileHeight = $("#previews .preview-mobile .banner-html").height();
            if (this.previewMobileHeight > 169) {
                this.mobileScaleRatio = (169 / this.previewMobileHeight).toFixed(2);
            }
            $("#previews .preview-mobile .banner-html").css('transform', 'scale(' + this.mobileScaleRatio + ')');
        },

        /**
         * Called after the resource is created.
         */
        createSuccess(response) {
            console.log('this.form');
            console.log(this.form);

            console.log('response');
            console.log(response);

            return new Promise((resolve, reject) => {
                let vue = this,
                    successAlert = {
                        title: "Success!",
                        text: `Banner <strong>${response.id}</strong> created successfully. Great job!<br /> <a href="/banner">Create another?</a>`,
                        type: "success",
                        showCancelButton: true,
                        closeOnCancel: true,
                        cancelButtonText: "Close",
                        confirmButtonText: "Return to List",
                        html: true,
                    };
                vue.resourceId = response.id;
                vue.form.status = 'Pending';

                if (response && response.created === 'true' && vue.hasNewImage) {
                    vue.handleImageUpload().then(function () {
                        swal(successAlert, function (isConfirm) {
                            if (isConfirm) {
                                // return to banner list
                                window.location = '/banners';
                            } else {
                                window.location = '/banner/' + vue.resourceId;
                            }
                        });
                        resolve();
                        return true;
                    }).catch(function () {
                        vue.undo();
                        vue.resourceId = false;
                        reject();
                        return false;
                    });
                }
                else if (response && response.created === 'true' && !vue.hasNewImage) {
                    swal(successAlert, function (isConfirm) {
                        if (isConfirm) {
                            // return to banner list
                            window.location = '/banners';
                        } else {
                            window.location = '/banner/' + vue.resourceId;
                        }
                    });
                    resolve();
                    return true;
                } else {
                    this.handleErrors(response);
                    reject();
                    return false;
                }
            });
        },

        beforeUpdate() {
            return new Promise((resolve, reject) => {
                let vue = this;
                if (vue.hasNewImage && vue.resourceId) {
                    vue.handleImageUpload().then(result => {
                        resolve(result);
                    }).catch(reject => {
                        reject(result);
                    });
                } else if (!vue.hasNewImage && vue.resourceId) {
                    resolve(true);
                }
                if (vue.form.status === "Approved") {
                    swal({
                            title: "Important",
                            text: "Important! Your banner has been updated, but it will not display in emails until it is approved.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "I understand",
                            cancelButtonText: "Cancel",
                            closeOnConfirm: true,
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                swal.close();
                                vue.update();
                            } else {
                                swal("Cancelled", "Your Banner is unchanged for now.", "error");
                            }
                        });
                    resolve(true);
                }
            });
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess(response) {
            console.log('this.form');
            console.log(this.form);

            console.log('response');
            console.log(response);

            if (response && response.updated === 'true') {
                this.updated = true;
                if (this.form.status == "Pending" || this.form.status == "Approved") {
                    swal({
                        title: "Success!",
                        text: "Banner successfully updated.",
                        type: "success",
                        confirmButtonText: "Ok"
                    }, function () {
                        location.reload();
                    });
                }

                if (this.form.status == "Denied") {
                    swal({
                        title: "Banner Denied!",
                        text: "Banner '" + this.form.name + "' has been denied.",
                        type: "success",
                        confirmButtonText: "Ok"
                    }, function () {
                        location.reload();
                    });
                }

            } else {

                this.handleErrors(response);

                return false;
            }
        },

        deleteSuccess(response) {
            if (response && response.destroyed == 'true') {
                swal({
                    title: "Success!",
                    text: "Banner successfully Archived.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function () {
                    window.location = window.location.origin + '/banners';
                });
            } else {

                this.handleErrors(response);

                return false;
            }
        },

        /**
         * silently Roll back the banner create because of an image upload error
         */
        undo() {
            this.$http.delete(this.resourceUri)
                .then(response => {
                })
                .catch(errors => {
                    this.handleErrors(errors);
                    reject(errors.data);
                });
        },

        /**
         * Approve the deletion of the given resource.
         */
        approveRestore() {
            let vue = this;

            swal({
                title: "Are you sure?",
                text: "Restoring a banner will also restore its associated Offer. Do you really want to restore this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, restore it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                vue.restore();
            });
        },

        restoreSuccess(response) {
            if (response && response.restored == 'true') {
                swal({
                    title: "Success!",
                    text: "Banner successfully restored.",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function () {
                    window.location = window.location.origin + '/banners/archived';
                });
            } else {
                this.handleErrors(response);

                return false;
            }
        },

        handleErrors(errors) {
            console.log('errors');
            console.log(errors);
            let vue = this;
            vue.updated = false;

            swal({
                title: "Error.",
                text: "We're sorry - it looks like there was an error and the changes were not saved. Please try again. ",
                type: "error",
                confirmButtonText: "Ok",
                customClass: "sweet-error"
            });

            if (errors.status == 422) {
                swal({
                    title: "Error.",
                    text: "We still need a little more information. Please complete the indicated fields.",
                    type: "error",
                    confirmButtonText: "Ok",
                    customClass: "sweet-error"
                }, function () {
                    // vue.form.status = "Pending";
                    // location.reload();
                });
            } else if (errors.data == "Forbidden") {
                swal({
                    title: "Error.",
                    text: "You do not have permission to perform this action.",
                    type: "error",
                    confirmButtonText: "Ok"
                });
            } else if (typeof errors.data.error != "undefined" && typeof errors.data.error.image != "undefined") {
                let image_type_substr = "The image must be a file of type:",
                    image_size_substr = "The image may not be greater than",
                    both_image_type_and_size_alert = {
                        title: "Error.",
                        text: "We are unable to process the image file you've chosen. Please upload your image as a .png, .jpg, .jpeg, or .gif. Also the image you're trying to upload exceeds our 1MB limit. Please upload a smaller file.",
                        type: "error",
                        confirmButtonText: "Ok",
                        customClass: "sweet-error",
                    },
                    image_type_alert = {
                        title: "Error.",
                        text: "We are unable to process the image file you've chosen. Please upload your image as a .png, .jpg, .jpeg, or .gif.",
                        type: "error",
                        confirmButtonText: "Ok",
                        customClass: "sweet-error",
                    },
                    image_size_alert = {
                        title: "Error.",
                        text: "We're sorry, but the image you're trying to upload exceeds our 1MB limit. Please upload a smaller file.",
                        type: "error",
                        confirmButtonText: "Ok",
                        customClass: "sweet-error",
                    };

                if (typeof errors.data.error.image[1] != "undefined") {
                    //both because if 1 is defined we also have zero meaning both type and size validations have failed
                    swal(both_image_type_and_size_alert);
                } else if (typeof errors.data.error.image[1] == "undefined" && errors.data.error.image[0].includes(image_size_substr)) {
                    swal(image_size_alert);
                } else if (typeof errors.data.error.image[1] == "undefined" && errors.data.error.image[0].includes(image_type_substr)) {
                    swal(image_type_alert);
                } else if (errors.status == 413) {
                    swal(image_size_alert);
                }
            } else {
                swal({
                    title: "Error.",
                    text: "We're sorry - it looks like there was an error and the changes were not saved. Please try again. ",
                    type: "error",
                    confirmButtonText: "Ok",
                    customClass: "sweet-error"
                });
            }
        },


    },

    events: {
        //catches a dispatch from the preview component to let us know templates are loaded
        'template-ready': function (msg) {
            console.log('TEMPLATE READY');
            //on load
            // this is so broken in vue 1 nothing works. All I can do is hack this. Events don't work
            // ready doesn't work, mounted doesn't work... there's no good way to know when a template
            // actually exists in the DOM in vue 1... there just isn't.
            // it's a constant problem and I really want to upgrade
            // even this component has hacky code at the bottom
            // because Maggie had the same hair pulling
            // issues
            var checkExist = setInterval(function () {
                if ($('table.banner-html').length) {
                    console.log("Exists!");
                    clearInterval(checkExist);
                }
            }, 100);
            var $templateHeight = $('table.banner-html').outerHeight();
            console.log($templateHeight);
            //this.resizeBannerContainers(this.$desktopPrevContainer, this.$mobilePrevContainer, $templateHeight);
        }
    },

    ready() {
        this.initDateTimePickers();
        this.initSelectMenu();
        this.initStaticView();
        this.initDropZonePlace();
        this.initPositioning();
    }

});

/**
 * After page load.
 */
$(function () {

    /**
     * Create Banner Navigation and scrollTo
     */

    $(".banner-nav-list li:first-child .banner-nav-tab").addClass("active");

    var sections = $('.create-section'),
        nav = $('.banner-navigation'),
        preview_height = 345;

    /*height of preview container + page title*/
    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();

        sections.each(function () {
            var top = $(this).offset().top - preview_height,
                bottom = top + $(this).outerHeight();

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                nav.find('a').parent().removeClass('active');
                sections.removeClass('active');
                $('#section-output').addClass('active');
                nav.find('a[href="#section-output"]').parent().addClass('active');

                return;
            }

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').parent().removeClass('active');
                sections.removeClass('active');
                $(this).addClass('active');
                nav.find('a[href="#' + $(this).attr('id') + '"]').parent().addClass('active');
            }
        });
    });

    nav.find('a').on('click', function () {
        var $el = $(this),
            id = $el.attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top - preview_height + 2
        }, 500);
        return false;
    });

    $(document).ready(function () {

        /**
         * Init tooltips
         */
        $('[data-toggle="tooltip"]').tooltip();


        /**
         * Select font size max and min sets on focus out of text input
         */

        $(".range-control .form-control").on('click', function(e){

            $(this).siblings().show();

        });

        $("#headline_font_size").focusout(function () {
            if (this.value < 16) {
                $(this).val(16);
            }
            if (this.value > 100) {
                $(this).val(100);
            }
        });

        $("#body_font_size").focusout(function () {
            if (this.value < 10) {
                $(this).val(10);
            }
            if (this.value > 30) {
                $(this).val(30);
            }
        });
    });


    //this works because there is an @change in the blade file associated to the div
    //@todo refactor to be within Vue structure
    //On page  triggering click
    $(window).load(function () {
        window.setTimeout(function () {
            $(".bannerStaticField").trigger('click');
        }, 1500);

    });

    $(document).on("click", ".preview a", function (e) {
        e.preventDefault();
    });

});
 });

});

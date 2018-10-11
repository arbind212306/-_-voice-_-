/*
 * code will work to display and hide progres bar
 * based on condition when document reloads 
 */
$(document).ready(function () {
    var email = $('#email').val();
    var complaintDetails = $('#concern_details').val();
    var captcha = $('#CaptchaInput').val();
    var categoryConcern = $('#category_concern').val();
    var subCategoryConcern = $('#category_concern_sub').val();
    var colleagueComplaint = $('#colleague_complaint').val();
    var writtenConcert = $('#written_concent').val();
    if (captcha === '' && complaintDetails === '' && email === '') {
        $(".checkout-bar").hide();
    }

    if (categoryConcern === '' || subCategoryConcern === '' || colleagueComplaint === '' || writtenConcert === '') {
        $(".checkout-bar").show();
    }
});

/*
 * the function will work based on diffrent condition mentioned below
 * when proceed btn is clicked
 */
$("#btn-proceed").mouseup(function () {
    var categoryConcern = $('#category_concern').val();
    var subCategoryConcern = $('#category_concern_sub').val();
    var colleagueComplaint = $('#colleague_complaint').val();
    var writtenConcert = $('#written_concent').val();
    var email = $('#email').val();
    var complaintDetails = $('#concern_details').val();
    var accusedName = $('#accused_name').val();
    var accusedDepartment = $('#accused_dept').val();
    var witnessName = $('#witness_name').val();
    var captcha = $('#CaptchaInput').val();

    /* condition will run if it gets the value and proced btn is clicked 
     * it will display the basic form details progress bar
     */
    if (categoryConcern !== '' && subCategoryConcern !== '' && colleagueComplaint !== '' && writtenConcert !== '') {
        if ($(".basic").is(":visible")) {
            showBasicDeatilsProgressBar();
        }
    }

    /* condition will run if it gets the respective value and proced btn is clicked 
     * it will display the work details progress bar
     */
    if (email !== '') {
        if ($(".work").is(":visible")) {
            workdetailsProgressBar();
        }
    }

    /* condition will run if it gets the respective value and proced btn is clicked 
     * it will display the complaint details progress bar
     */
    if (complaintDetails !== '') {
        if ($(".complaint").is(":visible")) {
            showComplaintProgressBar();
        }
    }

    /* condition will run if it gets the respective value and proced btn is clicked 
     * it will display the offender progress bar for filled value and also skkiped one
     */
    if ($(".offenderDiv").is(":visible")) {
        if (accusedName !== '' && accusedDepartment !== '') {
            showOffenedrValueFilledProgressBar();
        } else {
            showOffenderSkippedProgressBar();
        }
    }

    /* condition will run if it gets the respective value and proced btn is clicked 
     * it will display the witness progress bar for filled value and also skkiped one
     */
    if ($(".witnessessDiv").is(":visible")) {
        if (witnessName !== '') {
            showWitnessValueFilledProgressBar();
        } else {
            showWitnessSkippedProgressBar();
        }
    }

    /* condition will run if it gets the respective value and proced btn is clicked 
     * it will display the confirm details.
     */
    if (captcha !== '') {
        if ($(".confirmDiv").is(":visible")) {
            showConfirmProgressBar();
        }
    }

    /* 
     * function to display progress bar according to screen resolution
     * when basic deatils form is filled and proceed button is clicked
     */
    function showBasicDeatilsProgressBar() {
        $(".basicDetails").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#basicDetails:before{background: #0eb890;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.visited:after {background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 35px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.visited:after{background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when work deatils form is filled and proceed button is clicked 
     */
    function workdetailsProgressBar() {
        $("#workDetails").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#workDetails:before{background: #0eb890;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.previous:after {background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 35px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.previous:after{background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when compalint details form is filled and proceed button is clicked 
     */
    function showComplaintProgressBar() {
        $("#complaints").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#complaints:before{background: #0eb890;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.active:after {background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 20px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.active:after{background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when Offender details form is filled and proceed button is clicked 
     */
    function showOffenedrValueFilledProgressBar() {
        $("#offender").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#offender:before{background: #0eb890;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.next:after {background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 20px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.next:after{background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when Offender details form is skkiped and proceed button is clicked 
     */
    function showOffenderSkippedProgressBar() {
        $("#offender").css({"color": "#86C0B3"});
        $(".checkout-wrap").append('<style>#offender:before{background: #86C0B3 ;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.next:after {background-size: 35px 35px; background-color: #86C0B3; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 20px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.next:after{background-size: 35px 35px; background-color: #86C0B3; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when witness details form is filled and proceed button is clicked 
     */
    function showWitnessValueFilledProgressBar() {
        $("#witnessess").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#witnessess:before{background: #0eb890;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.witness:after {background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 20px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.witness:after{background-size: 35px 35px; background-color: #0eb890; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when witness details form is skipped and proceed button is clicked 
     */
    function showWitnessSkippedProgressBar() {
        $("#witnessess").css({"color": "#86C0B3"});
        $(".checkout-wrap").append('<style>#witnessess:before{background: #86C0B3 ;}</style>');
        if ($(window).width() < 800) {
            $(".checkout-wrap").append('<style> ul.checkout-bar li.witness:after {background-size: 35px 35px; background-color: #86C0B3; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 20px; left: 27%; position: absolute; top: 40px; width: 21%; z-index: 99;} </style>');
        } else {
            $(".checkout-wrap").append('<style>ul.checkout-bar li.witness:after{background-size: 35px 35px; background-color: #86C0B3; background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent); -webkit-box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); box-shadow: inset 2px 2px 2px 0px rgba(0, 0, 0, 0.2); content: ""; height: 15px; left: 50%; position: absolute; top: -50px; width: 100%; z-index: 99;}</style>');
        }
    }

    /*
     * function to display progress bar according to screen resolution
     * when confirm form is filled and submit button is clicked 
     */
    function showConfirmProgressBar() {
        $("#confirm").css({"color": "#0eb890"});
        $(".checkout-wrap").append('<style>#confirm:before{background: #0eb890;}</style>');
    }

});

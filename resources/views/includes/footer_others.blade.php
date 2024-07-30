<footer> 
    @include('includes/footer_links')
</footer>
</div>

<script> 

    $(document).ready(function() {
        
        let height = $(window).height();
        let width = $(window).width();

        if(width < 768) {
            var searchable = "{{ route('blog-searchable-all-affiliates-other-mobile') }}";
            var feedbacks = "#feedbackMobile";
        }else{
            var searchable = "{{ route('blog-searchable-all-affiliates-other') }}";
            var feedbacks = "#feedback";
        }
        
        $('#clicked').click(function() {
            $("ul.selectables li").removeClass('option-selected');
            $('.sticky-search').css({zIndex: 5});

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('affiliate-search-everything') }}",
                data: { everything: ''},
                success: function (data) {
                    $("#feedbackEverything").html(data);
                    $("#feedbackEverything").fadeOut(25);
                    $("#everything").val('');
                }
            });
        }); 

        $('#clicked_search_category').click(function() {
        $("ul.selectables li").removeClass('option-selected');

            $.ajax({
                type: "POST",
                url: searchable,
                data: { allCategory: ''},
                success: function (data) {
                    $(feedbacks).html(data);
                    $(feedbacks).fadeIn(25);
                    $("#allCategory").val('');
                }
            });
        });

        $('#clicked_search').click(function() {
            $("ul.selectables li").removeClass('option-selected');
            
            $.ajax({
                type: "POST",
                url: "{{ route('blog-searchable-all-brands') }}",
                data: { allBrand: ''},
                success: function (data) {
                    $("#feedback").html(data);
                    $("#feedback").fadeIn(25);
                    $("#allBarnd").val('');
                }
            });
        });

        $('#navbarSupportedContent').click(function (e) {
            $('#feedbackEverything').css({zIndex: 4, top: 10});
            $('nav.navbar').css({zIndex: 5});
        });

        $("#everything").keyup(function (e) {
            
        if(e.delegateTarget.value == '') {
            $('#feedbackEverything').css({zIndex: 3, top: 10});
            $('nav.navbar').css({zIndex: 4});
        }

        $('#feedbackEverything').css({height: 'fit-content', maxHeight: '777px', position: 'fixed', boxShadow: '0 0 12px 1px #dedede', margin: '110px 0 0'});
        // $("html, body").animate({ scrollTop: 0 }, "slow");
        e.preventDefault();

            let everything = $("#everything").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('affiliate-search-everything') }}",
                data: { everything: everything },
                success: function (data) {
                    $("#feedbackEverything").html(data);
                },
                complete: function () {
                    if (everything.length > 0) {
                        $("#feedbackEverything").fadeIn(25);
                    } else {
                        $("#feedbackEverything").fadeOut(25);
                    }
                },
            });
        });
        
        $("#allCategory").keyup(function (e) {
            e.preventDefault();
            $("ul.selectables li").removeClass('option-selected');

            let allCategory = $("#allCategory").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: searchable,
                data: { allCategory:allCategory },
                success: function (data) {
                    $(feedbacks).html(data);
                },
                complete: function () {
                    if (allCategory.length < 1) {
                        $("#visibility").fadeIn(25);
                    } else {
                        $("#visibility").fadeOut(25);
                    }
                },
            });
        });

        $("#allBrand").keyup(function (e) {
            e.preventDefault();

            let allBrand = $("#allBrand").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('blog-searchable-all-brands') }}",
                data: { allBrand:allBrand },
                success: function (data) {
                    $("#feedback").html(data);
                },
                complete: function () {
                    if (allBrand.length < 1) {
                        $("#visibility").fadeIn(25);
                    } else {
                        $("#visibility").fadeOut(25);
                    }
                },
            });
        });

        let search_affiliate = $(<?php echo json_encode($search_categories); ?>);

        for(var i = 0; i < search_affiliate.length; i++) {

            $("#" + search_affiliate[i]['category']).click(function(e) {
                e.preventDefault();
                $("#allCategory").val('');
                $("ul.selectables li").removeClass('option-selected');
                $("#" + e.target.id).addClass('option-selected');
                // console.log(window.location.href.split('/')[4]);

                if($("#id-" + e.target.id + " input").prop('checked')) {
                    $("#id-" + e.target.id + " input").attr('checked', false);
                }else{

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url: "{{ route('blog-searchable-affiliates-page') }}",
                        data:{search_affiliate:e.target.id},
                        // data:{search_affiliate:e.target.id},
                        success:function(data) {
                            $("#feedback").html(data);
                            $("#visibility").fadeOut(25);
                        },
                        complete: function () {
                            if(search_affiliate.length < 1) {
                                $("#visibility").fadeIn(25);
                            }else{
                                // console.log(previous);
                                $("#visibility").fadeOut(25);
                                $("#" + e.target.id).addClass('option-selected');
                            }
                        }
                    });                      
   
                    $("#" + e.target.id + " input").attr('checked', true);        
                }
            });
        }
    });
</script>

</body>
</html>
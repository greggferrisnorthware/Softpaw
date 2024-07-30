<footer class="<?php if(!empty($url[6])) { echo 'add-this-space'; } ?>">
    @include('includes/footer_links')
</footer>
</div>

<script>

    $(document).ready(function() {

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
            
        $('#navbarSupportedContent').click(function (e) {
            $('#feedbackEverything').css({zIndex: 4, top: 10});
            $('nav.navbar').css({zIndex: 5});
        });

        $('#everything').keyup(function (e) {
            $("ul.selectables li").removeClass('option-selected');
            $('.sticky-search').css({zIndex: 1});

            if(e.delegateTarget.value == '') {
                $('#feedbackEverything').css({zIndex: 3, top: 10});
                $('nav.navbar').css({zIndex: 4});
            }

            $('#feedbackEverything').css({height: 'fit-content', maxHeight: '777px', position: 'fixed', boxShadow: '0 0 12px 1px #dedede', margin: '110px 0 0', zIndex: 2});
            // $("html, body").animate({ scrollTop: 0 }, "slow");
            e.preventDefault();
            
            // let everything = '';
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

        var seen = {};
        jQuery('.fix-dropper').children().each(function() {
            var txt = jQuery(this).attr('value');
            if (seen[txt]) {
                jQuery(this).remove();
            } else {
                seen[txt] = true;
            }
        });

        var star = {};
        jQuery('.fix-dropper-star').children().each(function() {
            var txt = jQuery(this).attr('value');
            if (star[txt]) {
                jQuery(this).remove();
            } else {
                star[txt] = true;
            }
        });

        var rank = {};
        jQuery('.fix-dropper-rank').children().each(function() {
            var txt = jQuery(this).attr('value');
            if (rank[txt]) {
                jQuery(this).remove();
            } else {
                rank[txt] = true;
            }
        });
    });
</script>

</body>
</html>
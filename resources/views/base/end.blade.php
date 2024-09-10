<!-- scripts -->
        
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module">
    $(document).ready(function() {
        var toggleOpen = $('#toggleOpen');
        var toggleClose = $('#toggleClose');
        var collapseMenu = $('#collapseMenu');

        function handleClick() {
            if (collapseMenu.css('display') === 'block') {
                collapseMenu.slideUp(500, function() {
                    collapseMenu.css('display', 'none');
                });
            } else {
                collapseMenu.slideDown(500, function() {
                    collapseMenu.css('display', 'block');
                });
            }
        }

        toggleOpen.on('click', handleClick);
        toggleClose.on('click', handleClick);
    });
</script>
<!-- end scripts -->

</body>
</html>
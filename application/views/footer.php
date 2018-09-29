</body>
<script>
    $('#fileInput').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</html>
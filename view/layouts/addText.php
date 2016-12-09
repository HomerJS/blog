<!--     блог                             -->
<form action="" method="post" onsubmit="return valid()">

    <hr>
    <div class="container">
        <br>
        <h1 class="text-center">Создать свою запись</h1>

        <br>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="InputName">Name</label>
                    <input type="text" class="form-control" id="InputName" placeholder="Jane Doe" name='author'>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="text">Message</label>
            <textarea class="form-control" rows="10" id="text" name='blog'></textarea>
        </div>

        <button type="submit" class="btn btn-default" name="send" value='ok' >Send</button>

    </div>
    <br>


</form>

<script>
    function valid()
    {
        var a=$('#text').val();
       
        if(!a.length)
        {
            alert('заполните текстовое поле');
            return false;
        }
        return true;
    }
</script>
    <form class=formfields action="/gallery/p_add" method="post"
        enctype="multipart/form-data">

        <?php if(isset($error)): ?>
            <div class='error'>
                    Invalid file type or error moving file
            </div>
        <?php endif; ?>

        Description (optional)<br>
        <input type='text' name='desc'>
        <br><br>

        <label for="file">Filename:</label>
        <input type="file" name="file" id="file" required><br>

        <input type="submit" name="submit" value="Add photo">
    </form>

</form>
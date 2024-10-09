<script>
    function closeDiv() {
        error = document.getElementById("forbidden")
        error.style.display = "none"
    }
</script>
<?php $error = "Sign Up Error" ?>
<div id="forbidden" class="forbidden-error has-text-centered" onclick="closeDiv()">

    <div class="has-text-danger">
        Sign Up Error
    </div>
</div>
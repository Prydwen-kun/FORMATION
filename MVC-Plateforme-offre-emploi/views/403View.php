<script>
    function closeDiv() {
        error = document.getElementById("forbidden")
        error.style.display = "none"
    }
</script>
<?php $error = "Forbidden" ?>
<div id="forbidden" class="forbidden-error has-text-centered" onclick="closeDiv()">

    <div class="has-text-danger">
        Access Forbidden
    </div>
</div>
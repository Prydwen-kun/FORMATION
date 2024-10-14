<script>
    function closeDiv() {
        error = document.getElementById("forbidden")
        error.style.display = "none"
    }
</script>
<?php $error = "Invalid ID" ?>
<div id="forbidden" class="forbidden-error has-text-centered" onclick="closeDiv()">

    <div class="has-text-danger">
        Invalid ID
    </div>
</div>
<script>
    function closeDiv() {
        error = document.getElementById("accountCreated")
        error.style.display = "none"
    }
</script>
<?php $error = "Account Created" ?>
<div id="accountCreated" class="account-created has-text-centered" onclick="closeDiv()">

    <div class="has-text-warning">
        Account Created
    </div>
</div>
<?php
    if(isset($_SESSION["alertMsg"])){
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    title: '<?php echo $_SESSION['title']?>',
    text: '<?php echo $_SESSION['text']?>',
    icon: '<?php echo $_SESSION['icon']?>'
}).then(() => {
    location.replace("<?php echo $_SESSION['location']?>");
})
</script>
<?php
    unset($_SESSION['alertMsg']);
    unset($_SESSION['icon']);
    unset($_SESSION['text']);
    unset($_SESSION['title']);
} 
?>
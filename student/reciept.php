<script>

    const element = document.getElementById('receipt').innerHTML;
    const filenames = document.getElementById('filename').innerHTML
    const options = {
        margin: 10,
        filename: filenames,
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 3 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    
    html2pdf().set(options).from(element).save().then(() => {
        // Wait a little before closing
        setTimeout(() => {
            window.close(); // Works only if tab was opened via JS
        }, 1000);
    });
</script>
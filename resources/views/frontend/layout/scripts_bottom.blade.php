<script src="{{ asset('dist-frontend/js/custom.js') }}"></script>
<script>
    const btn = document.getElementById("btn");
    btn.addEventListener("click", () => {
            btn.disabled = true;
            btn.innerText = "Please wait...";
    });
</script>

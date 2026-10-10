    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
      document.getElementById("logout-button").addEventListener("click", function () {
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "./login.php";
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "logout";
        input.value = "1";
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
      });
    </script>
  </body>
</html>
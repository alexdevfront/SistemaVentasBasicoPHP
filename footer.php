<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #9b9b9b;
  color: black;
  text-align: center;
}
</style>
<footer class="footer" >
<table>
  <tr>
    <td>Usuario Conectado: <?php echo $_SESSION["nombres"];?></td>
  </tr>
</table>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
<body>
  <br><br><br><br>
  <center>
    <form action="<?=  base_url('Home/contactOutput'); ?>">
      <table>
        <tr>
          <th colspan="3">
            <h1>CONTACT US</h1>
          </th>
        </tr>
        <tr>
          <td colspan="3">
            <hr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <br><br>
          </td>
        </tr>
        <tr>
          <th>Nama</th>
          <td>:</td>
          <td>
            <input type="text" name="nama" id="nama">
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td>:</td>
          <td>
            <input type="text" name="email" id="email">
          </td>
        </tr>
        <tr>
          <th>Comment</th>
          <td>:</td>
          <td>
            <textarea name="comment" rows="5" cols="40"></textarea>
          </td>
        </tr>
         <tr>
          <td colspan="3">
            <br>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <a class="next" href="<?=  base_url('Home/contactOutput'); ?>">SEND COMMENT</a>
          </td>
        </tr>
         <tr>
          <td colspan="3">
            <br><br>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <a href="https://wa.me/6285219067686?text=Nama%3A%0AEmail%3A%0AComment%3A">Chat Via WhatsApp</a>
          </td>
        </tr>
      </table>
      
    </form>
  </center>
  <br>
</body>

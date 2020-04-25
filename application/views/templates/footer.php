<!-- Footer -->
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>

    <!-- <?php
    $query = "SELECT * FROM chat ORDER BY date ASC";
    $res = mysqli_query($conn, $query);

    while ($data = mysqli_fetch_array($res)) {
      $user = $data['user'];
      $chatbot = $data['chatbot'];
      $date = $data['date'];
    ?>

      <div class="container1" style="margin-right: 400px;">
        <img src="avatar.jpg" alt="Avatar" style="width: 100%;">
        <p id="message"><?= $user; ?></p>
        <span class="time-right"><?= $date; ?></span>
      </div>

      <div class="container1 darker" style="margin-left: 400px;">
        <img src="avatar.jpg" alt="Avatar" class="right" style="width: 100%;">
        <p><?= $chatbot; ?></p>
        <span class="time-left"><?= $date; ?></span>
      </div>

    <?php } ?> -->

    <div class="sticky">
      <div class="row">
        <div class="col-md-12">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="msg">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="button" onclick="send();">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <?php
          $query = "SELECT * FROM chat ORDER BY date ASC";
          $res = mysqli_query($query);

          while ($data = mysqli_fetch_array($res)) {
            $user = $data['user'];
            $chatbot = $data['chatbot'];
            $date = $data['date'];
          ?>

    <div class="container1" style="margin-right: 400px;">
                <img src="avatar.jpg" alt="Avatar" style="width: 100%;">
                <p id="message"><?= $user; ?></p>
                <span class="time-right"><?= $date; ?></span>
            </div>

            <div class="container1 darker" style="margin-left: 400px;">
                <img src="avatar.jpg" alt="Avatar" class="right" style="width: 100%;">
                <p><?= $chatbot; ?></p>
                <span class="time-left"><?= $date; ?></span>
            </div>

            <?php } ?>

            <div class="sticky">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="msg">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" onclick="send();">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

    <!-- <div class="container darker">
      <p>Hey! I'm fine. Thanks for asking!</p>
      <span class="time-left">11:01</span>
    </div>

    <div class="container">
      <p>Hello. How are you today?</p>
      <span class="time-right">11:00</span>
    </div>

    <input type="text" placeholder="Type message.." name="msg" required>

    <button type="submit" class="btn">Send</button> -->
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


</body>

</html>
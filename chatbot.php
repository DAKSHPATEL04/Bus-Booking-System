<!DOCTYPE html>
<html lang="en">
<head>
  
    
    <link rel="stylesheet" href="chatbot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        /* Additional styles for chat form */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            max-width: 400px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .chat-popup h1 {
            background: #ffa500;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            line-height: 40px;
            text-align: center;
            margin: 0;
            border-radius: 5px 5px 0 0;
        }

        .chat-popup .form-container {
            padding: 20px;
        }

        .chat-popup .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            background: #f1f1f1;
            resize: none;
            min-height: 100px;
        }

        .chat-popup .form-container .btn {
            background-color: #ffa500;
            color: #fff;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 3px;
        }

        .chat-popup .form-container .btn.cancel {
            background-color: black;
        }

        .open-button {
            background-color: #ffa500;
            color: #fff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            font-size: 24px;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .clear-button {
            background-color: #ff4444;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            margin-top: 10px;
        }
        .sender-icon {
            font-size: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="open-button" onclick="openForm()">
        <i class="fas fa-comments"></i> <!-- Chat icon from Font Awesome -->
    </div>

    <div class="chat-popup" id="myForm">
        <h1>Chat</h1>
        <form class="form-container">
            <div class="form">
            <div class="bot-inbox inbox">
    <div class="icon">
        <i class="fas fa-robot"></i> <!-- Sender's icon -->
    </div>
    <div class="msg-header">
        <p>Hello there, how can I help you?</p>
    </div>
</div>

<!-- Add an icon to the reply message -->

            </div>
            <div class="typing-field">
                <div class="input-data">
                    <textarea id="data" placeholder="Type something here.." required></textarea>
                    <button type="button" class="btn" id="send-btn">Send</button>
                </div>
            </div>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            <button type="button" class="btn clear-button" onclick="clearChat()">Clear</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
    $("#send-btn").on("click", function(){
        $value = $("#data").val().trim(); // Trim whitespace from the message

        // Check if the message is not empty
        if ($value !== "") {
            $msg = '<div class="user-inbox inbox" style="justify-content: flex-end;"><div class="msg-header"><div class="icon" style="margin-left: 10px;"><i class="fas fa-user"  style="padding-left: 219px;"></i></div><p style="text-align: right; color: #333;">' + $value + '</p></div></div>';

            $(".form").append($msg);
            $("#data").val('');

            // Start AJAX code
            $.ajax({
                url: 'chatmessage.php',
                type: 'POST',
                data: 'text='+$value,
                success: function(result){
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot" ></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                    $(".form").append($replay);
                    // Scroll to the bottom when a new message is added
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        }
    });
});

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
        function clearChat() {
            $(".form").html(""); // Clears the chat content
        }
    </script>
</body>
</html>

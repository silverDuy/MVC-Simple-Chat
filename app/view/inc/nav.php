<div class=" list-content col-lg-12">
    <?php
    $_SESSION['noti'] = 0;
    echo "<h3 class=\"add-room active\">
		Direct <span class=\"room-count-small\"></span>
	</h3>";
    $link = URL . 'Direct/chat/';
    foreach ($userLists as $key => $userList) {
        if ($userList['id'] == $_SESSION['id']) continue;
        $newMess = '';
        if ($userList['count'] > 0) {
            $newMess = 'new-noti';
            $_SESSION['noti']++;
        }
        $class = "";
        $online = 'ofline';
        if ($userList['status'] == 1) $online = 'online ';
        if (isset($_GET['id']))
            if ($userList['id'] == $_GET['id'] && $_GET['ctl'] == 'Direct') $class = "current";
        echo "<div class='user {$online} {$class} {$newMess}'><a href={$link}{$userList['id']}><span>@ {$userList['username']}</span></a></div>";
    }
    $link = URL . 'Room/chat/';
    echo "<h3 class=\"add-room active\">
		Channels <span class=\"room-count-small\"></span>
	</h3>";

    foreach ($roomLists as $key => $roomList) {
        $class = "";
        $newMess = '';
        if ($roomList['is_read'] == 0) {
            $newMess = 'new-noti';
            $_SESSION['noti']++;
        }
        if (isset($_GET['id']))
            if ($roomList['id'] == $_GET['id'] && $_GET['ctl'] == 'Room') $class = "current";
        echo "<div class='user ofline {$class} {$newMess}'><a href='{$link}{$roomList['id']}'><span>@ {$roomList['name']}</span></a></div>";
    }
    ?>
    <input type="hidden" name="sessionNoti" id="sessionNoti" value="<?php echo $_SESSION['noti']; ?>">
</div>
<script>
    $('.list-content div a').on("click", function (e) {
        $('.list-content div').removeClass('current');
        var $parent = $(this).parent();
        if (!$parent.hasClass('current')) {
            $parent.addClass('current');
        }
        var targetUrl = $(this).attr("href");
        history.pushState(null, null, targetUrl);
        $.ajax({
            url: targetUrl,
            success: function (data) {
                $(".chatbox-wrapper").html(data);
                if (localStorage['lastShow'] != $(".msgs .msg:last").attr("title")) {
                    doScroll();
                }
            }
        });
        e.preventDefault();
        return false;
    });
</script>
<?php

namespace OpenSB;

global $auth, $database, $twig;

use OpenSB\class\Core\Templating;
use OpenSB\class\Core\UserData;

if (isset($_POST['really'])) {
    switch ($_POST['type']) {
        case "video":
            $type = 0;
            $table = "upload_comments";
            $id = ($_POST['vidid'] ?? "");
            $reply_to = ($_POST['reply_to'] ?? "0");
            break;
        case "profile":
            $type = 1;
            $table = "user_profile_comments";
            $id = ($_POST['uid'] ?? "");
            $reply_to = ($_POST['reply_to'] ?? "0");
            break;
        case "journal":
            $type = 2;
            $table = "journal_comments";
            $id = ($_POST['uid'] ?? "");
            $reply_to = ($_POST['reply_to'] ?? "0");
            break;
    }
} else {
    die("this is invalid");
}

$author = new UserData($database, $auth->getUserID());

$comment = [
    "id" => 123456789,
    "posted_id" => 987654321,
    "post" => $_POST['comment'],
    "posted" => time(),
    "author" => [
        "id" => $auth->getUserID(),
        "info" => $author->getUserArray(),
    ],
];

if ($type == 0) {
    $database->query("INSERT INTO comments (id, reply_to, comment, author, date, deleted) VALUES (?,?,?,?,?,?)",
        [$id, $reply_to, $_POST['comment'], $auth->getUserID(), time(), 0]);
} elseif ($type == 1) {
    $database->query("INSERT INTO user_profile_comments (id, reply_to, comment, author, date, deleted) VALUES (?,?,?,?,?,?)",
        [$id, $reply_to, $_POST['comment'], $auth->getUserID(), time(), 0]);
} elseif ($type == 2) {
    $database->query("INSERT INTO journal_comments (id, reply_to, comment, author, date, deleted) VALUES (?,?,?,?,?,?)",
        [$id, $reply_to, $_POST['comment'], $auth->getUserID(), time(), 0]);
} else {
    die("this is still invalid");
}

echo $twig->render('components/comment.twig', [
    'data' => $comment
]);
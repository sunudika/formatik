<div class="col-8">
    <?php if (isset($_SESSION['username'])) {
        $username = $_GET['username'];
        $sql_profile = mysqli_query($con, "SELECT * FROM user WHERE username='$username'") or die(mysqli_error($con, ""));
        if (mysqli_num_rows($sql_profile) > 0) {
            while ($profile = mysqli_fetch_array($sql_profile)) {
                $img_profile = $profile['img_profile'];
            };
        } ?>
        <?php if($_SESSION['username'] === $username) { ?>
        <div style="background-color:rgba(255, 255, 255, 0.5); margin-top:20px;">
            <img src="<?= base_url() ?>/images/profile/<?= $img_profile ?>" alt="" style="border-radius:100%; margin-left:10px;" width="40" height="40px">
            <a href="" style="color:black"><?= $_SESSION['username']; ?></a>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="judul" placeholder="judul" style="display: block; margin-left: auto; margin-right: auto; width:99%">
                <textarea name="isi" cols="100" rows="3" style="display: block; margin-left: auto; margin-right: auto;" placeholder="Ketik postingan anda disini"></textarea>
                <input type="file" name="photo" value="upload foto"><br>
                <input type="submit" name="post_kirim" class="btn btn-secondary" value="profil" style="width:100%;">
            </form>
        </div>
    <?php }else { } } ?>

    <?php
    $sql_post = mysqli_query($con, "SELECT * FROM post JOIN user ON post.nama_user=user.username AND nama_user='$username' ORDER BY post.id DESC LIMIT 0, 10") or die(mysqli_error($con, ""));
    if (mysqli_num_rows($sql_post) > 0) {
        while ($post = mysqli_fetch_array($sql_post)) {
            $img_profile = $post['img_profile'];
            ?>
            <div style="background-color:rgba(255, 255, 255, 0.5); margin-top:20px;">
                <div>
                    <img src="<?= base_url() ?>/images/profile/<?= $img_profile ?>" alt="" style="border-radius:100%; margin-left:10px;" width="40px" height="40px">
                    <a href="<?php echo "profile_teman.php?username=".$post['nama_user']; ?>" style="color:black"><?= $post['nama_user']; ?></a> Pada <?= $post['date_created']; ?>
                    <br>
                </div>
                <?php if ($post['img_post'] != "") { ?>
                    <img src="<?= base_url() ?>/images/thread/<?= $post['img_post']; ?>" style="display: block; margin-left: auto; margin-right: auto;" alt="Ceritanya ini foto" width="500">
                <?php } ?>
                <h5 style="padding: 20px 20px 0 20px;"><?= $post['judul']; ?></h5>
                <hr>
                <?php
                        $id_post = $post['id'];
                        $sql_comment = mysqli_query($con, "SELECT * FROM comment WHERE id_post='$id_post'") or die(mysqli_error($con, ""));
                        if (mysqli_num_rows($sql_comment) > 0) {
                            while ($comment = mysqli_fetch_array($sql_comment)) { ?>
                        <div style="padding: 0 30px">
                            <a href=""><?= $comment['nama_user']; ?></a> <?= $comment['comment']; ?>
                            <br>
                            <a href="" style="padding-left:100px;">Suka</a> Pada <?= $comment['date_created']; ?>
                        </div>
                <?php };
                        } ?>

                <table style="width:100%; text-align:center">
                    <tr>
                        <td><button style="background-color:blue; color:white; width:100%">Cendol Dawet</button></td>
                        <td><button style="background-color:red; color:white; width:100%">Bata Atos</button></td>
                    </tr>
                </table>
                <button style="width:100%">Lihat Selengkapnya</button>
            </div>
    <?php };
    } ?>

    <div style="background-color:rgba(255, 255, 255, 0.5); margin-top:20px;">
        <button style="width:100%">Load Thread</button>
    </div>
</div>
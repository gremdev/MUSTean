<div class="main">
    <div class="center-piece">
        <a href="<?= base_url() ?>"><img src="<?= base_url('public/img/must.png') ?>" alt="MUST"/></a><br/><br/>
        <?php 
            if (isset($error)) {
                echo "<div class='label label-danger'>Invalid Login details...</div>";
            }
        ?>
        <?php echo form_open('login'); ?>
            <div class="form-group">
                <?php echo form_error('username'); ?>
                <input type="text" placeholder="username" class="username form-control" name="username" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('password'); ?>
                <input type="password" placeholder="password" class="password form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-primary btn-block">Login</button><br/>
                <a href="<?= base_url() ?>"> &laquo; Back</a>
            </div>
        </form>
    </div>
</div>
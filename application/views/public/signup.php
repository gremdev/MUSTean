<div class="main">
    <div class="center-piece">
        <a href="<?= base_url() ?>"><img src="<?= base_url('public/img/must.png') ?>" alt="MUST"/></a><br/><br/>

    <?php echo form_open('signup'); ?>

                <div class="form-group">
                <?php echo form_error('fullname'); ?>
                    <input type="text" placeholder="fullname" class="fullname form-control" name="fullname" value="<?php echo set_value('fullname'); ?>">
                </div>
                <div class="form-group">
                <?php echo form_error('email'); ?>
                    <input type="email" placeholder="email address" class="email form-control" name="email" value="<?php echo set_value('email'); ?>">
                </div>
                <div class="form-group">
                <?php echo form_error('username'); ?>
                <input type="text" placeholder="username" class="username form-control" name="username" value="<?php echo set_value('username'); ?>">
                </div>
                <div class="form-group">
                <?php echo form_error('password'); ?>
                    <input type="password" placeholder="password" class="password form-control" name="password">
                </div>
                <div class="form-group">
                <?php echo form_error('birthday'); ?>
                    <input type="date" placeholder="Birthday" class="birthday form-control" name="birthday" value="<?php echo set_value('birthday'); ?>"/>
                </div>
                <div class="form-group">
                <?php echo form_error('address'); ?>
                    <input type="text" placeholder="address" class="address form-control" name="address" value="<?php echo set_value('address'); ?>">
                </div>
                <div class="form-group">
                    <input type="submit" id="submit" class="btn btn-primary btn-block" value="Register"><br/>
                    <a href="<?= base_url() ?>"> &laquo; Back</a>
                </div>
        </form>


    </div>
</div>
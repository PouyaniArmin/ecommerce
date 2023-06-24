<section class="p-4">
    <h1>Contact Us</h1>
    <div class="p-4">
        <div class="ps-4 text-start w-50">
            <form method="post">
                <div class="mb-3">
                    <label for="username1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="username1" aria-describedby="emailHelp">
                    <p class="p-1 text-danger"><?php echo $name?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <p class="p-1 text-danger"><?php echo $email?></p>
                </div>
                <div class="mb-3">
                    <label for="message1" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message1"></textarea>
                    <p class="p-1 text-danger"><?php echo $message?></p>
                </div>

                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password1">
                    <p class="p-1 text-danger"><?php echo $password?></p>
                </div>

                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="password2">
                    <p class="p-1 text-danger"><?php echo $confirmPassword?></p>
                </div>
                
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</section>
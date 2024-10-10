<?php 
session_start();
function displaySignUpForm() { ?>
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://variety.com/wp-content/uploads/2024/07/Terrifier-poster.jpeg?w=724" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1 text-light"><?php echo $_SESSION['username'] ?></div>
                <h1 class="display-5 fw-bolder text-light">Spooky Movie Name</h1>
                <p class="lead text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <div class="d-flex text-warning">
                <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                    <div class="bi-star"></div>
                </div>
            </div>
        </div>
    </div>
<?php }

function displayLoginForm() { ?>
    <form class="col-lg-6 offset-lg-3" method="POST" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-light">Email address</label>
            <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label text-light" for="exampleCheck1">Correct Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php } ?>
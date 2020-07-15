<!-- View | Account -->
<div class="section" id="contact-form">
    <div class="container">

        <div class="form-content">
            <div>

                <h2>Login</h2>
                <?= session()->getFlashdata('msg') ? session()->getFlashdata('msg') : '' ?>
                <hr>
                <button id="btn-login-i">Login</button>

                <div class="form-login">

                    <form action="<?= base_url('/home/login') ?>" method="POST">

                        <input type="text" class="fields" name="email" placeholder="E-mail Address">
                        <input type="password" class="fields" name="password" placeholder="Password">
                        <input type="submit" class="fields-btn" value="Login" name="btn-login">
                    </form>
                </div>
            </div>

            <div>
                <h2>Criar Conta</h2>
                <hr>
                <button id="btn-register-i">Register-se</button>
                <div class="form-new-account">
                    <form onsubmit="event.preventDefault(); create()" method="POST">
                        <input type="text" class="fields" id="name" name="name" placeholder="First Name">
                        <input type="email" class="fields" id="email" name="email" placeholder="E-mail Address">
                        <input type="tel" class="fields" id="phone" id="phone" name="phone" placeholder="9xxxxxxxx">
                        <input type="text" class="fields" id="country" id="country" name="country" placeholder="País">
                        <input type="text" class="fields" id="city" id="city" name="city" placeholder="Cidade ou Província">
                        <input type="text" class="fields" id="district" id="district" name="district" placeholder="Destrito">
                        <input type="text" class="fields" id="street" id="street" name="street" placeholder="Rua">
                        <input type="text" class="fields" id="home" id="home" name="home" placeholder="Nº da casa">
                        <input type="password" class="fields" id="password" id="password" name="password" placeholder="Password">
                        <input type="password" class="fields" id="confirm_password" id="password" name="password" placeholder="Password">
                        <br> <input type="submit" class="fields-btn" value="Salvar" id="btn" name="btn-login">
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Palavra não combina");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    function create() {
        var name = $('#name').val()
        var email = $('#email').val()
        var phone = $('#phone').val()
        var country = $('#country').val()
        var city = $('#city').val()
        var district = $('#district').val()
        var street = $('#street').val()
        var home = $('#home').val()
        var password = $('#password').val()
        $.ajax({
            url: '/user/create',
            method: 'POST',
            data: {
                name:name,
                email:email,
                phone:phone,
                country:country,
                city:city,
                district:district,
                street:street,
                home:home,
                password:password,
            },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                location.reload()
            }, 
            error: function(data){
                console.log(data)
            }
        })
    }
</script>
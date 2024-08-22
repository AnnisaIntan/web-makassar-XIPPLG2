<div class="login">
  <div class="page">
    <div class="containerlogin">
        <div class="left">
            <div class="content">
                <h1>Selamat datang kembali!</h1>
                <p>Silakan masuk ke akun Anda</p>
                <form action="login_proses.php" method="post">
                    <div class="input-group">
                        <input type="text" id="username" name="id_pengelola" maxlength="50" required>
                        <label for="username">Nama Pengguna</label>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" maxlength="100" required>
                        <label for="password">Kata Sandi</label>
                    </div>
                    <div>
                        <button class="button-6" type="submit">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <img src="../foto/logo.png" alt="Login Image">
        </div>
    </div>
  </div>
</div>

<style>
.login {
  margin: 5rem auto;
  box-sizing: border-box;
  padding: 0;
  color: #430A5D;
}

.page {
  display: flex;
  justify-content: center;
  align-items: center;
}

.containerlogin {
  display: flex;
  width: 900px;
  background-color: #FFF2D8;
  border-radius: 20rem 20rem;
  box-shadow: 50px 50px rgba(0, 0, 0, 0.1);
}

.left {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 0 40px 50px;
}

.right {
  flex: 1;
  overflow: hidden;
}

.right img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.content {
  max-width: 300px;
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

.input-group {
  position: relative;
  margin-bottom: 20px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  font-size: 16px;
}

.input-group label {
  position: absolute;
  left: 10px;
  top: 10px;
  padding: 0 5px;
  background: #fff;
  transition: 0.3s;
}

.input-group input:focus + label,
.input-group input:valid + label {
  top: -10px;
  left: 10px;
  color: #430A5D;
  font-size: 12px;
}

.actions {
  display: flex;
  justify-content: center;
  align-items: center;
}

button {
  background-color: #8C6A5D;
  border-radius: 50px;
  color: #FFF2D8;
  border: 2px solid #5F374B;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1.2rem;
}
</style>
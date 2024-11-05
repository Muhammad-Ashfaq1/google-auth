<template>
  <div class="form-container">
    <!-- FORM ROW -->
    <div class="form-row">
      <!-- LEFT COLUMN -->
      <div class="left-column">
        <div class="login-form">
          <h1>Welcome Back, Muhammad</h1>
          <p>Welcome Back! Please enter your details!</p>
          <button class="google-btn" @click="loginWithGoogle">
            <span class="icon">
              <img src="https://i.ibb.co/x5Hb7YC/google.png" alt="Login With Google">
            </span>
            Login with Google
          </button>
          <div class="divider"> <span>Or</span> </div>
          <form @submit.prevent="login">
            <div class="form-group">
              <input
                  type="email"
                  class="field-wrap"
                  name="email"
                  placeholder="Email"
                  required
                  v-model="email"
              />
            </div>
            <div class="form-group">
              <input
                  type="password"
                  class="field-wrap"
                  placeholder="Password"
                  name="password"
                  required
                  v-model="password"
              />
            </div>
            <button type="submit" class="signup-btn">Log in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LoginComponent',
  data() {
    return {
      email: '',
      password: '',
      token: localStorage.getItem('token'),
    };
  },
  methods: {
    loginWithGoogle() {
      window.location.href = `${this.$env.apiUrl}/api/auth/google`;
    },
    async login() {
      try {
        const response = await axios.post(`${this.$env.apiUrl}/api/auth/login`, {
          email: this.email,
          password: this.password,
        });
        // Handle successful login
        localStorage.setItem('token', response.data.token);
        this.token = response.data.token;
        this.$router.push('/');
      } catch (error) {
        console.error('Login error:', error);
        alert('Login failed. Please check your credentials.');
      }
    },
  },
  created() {
    const queryParams = new URLSearchParams(window.location.search);
    if (queryParams.has('token')) {
      if (localStorage.getItem('token') == null || localStorage.getItem('token') == '') {
        this.token = queryParams.get('token');
        localStorage.setItem('token', this.token);
      }
      window.location.href = '/';
    }
  },
}
</script>


<style scoped>

.form-row {
  /* display: flex; */
  height: 100%;
}

.left-column {
  border: 1px solid #ccc;
  width: 30%;
  margin: 20px auto;
  border-radius: 10px;
  /* flex-basis: 50%; */
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.login-form {
  max-width: 100%;
  padding: 50px 50px;
}

.login-form h1 {
  color: #121727;
  margin-bottom: 0px;
  line-height: normal;
  font-size: 28px;
  margin-top: 0px;
}

.login-form p {
  margin-top: 5px;
  margin-bottom: 0px;
}

.google-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 16px 30px;
  background-color: transparent;
  color: #3a3f48;
  font-weight: bold;
  font-size: 16px;
  margin-bottom: 20px;
  cursor: pointer;
  border: 1px solid #d2d5d7;
  width: 100%;
  border-radius: 8px;
  margin-top: 25px;
}

.google-btn .icon {
  margin-right: 10px;
}

.divider {
  margin-top: 30px;
  margin-bottom: 30px;
  text-align: center;
  position: relative;
  z-index: 1;
  background: #fff;
  display: block;
}

.divider span {
  color: #a4a6aa;
  line-height: normal;
  background: #fff;
  z-index: 1;
  position: relative;
}

.divider:before {
  content: '';
  width: 100%;
  position: absolute;
  height: 1px;
  background: #f8f8f8;
  left: 0;
  bottom: 9px;
}

.form-group {
  position: relative;
  margin-bottom: 20px;
}

.form-group input {
  transition: border-color 0.3s ease;
  display: block;
  width: 100%;
  padding: 15px 0px;
  margin-bottom: 20px;
  border: none;
  border-bottom: 1px solid #dddfdf;
  font-size: 16px;
  color: #a0a5ae;
}

.form-group input:focus {
  outline: none;
}


.forgot-password {
  color: #000;
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
}

button.signup-btn {
  width: 100%;
  padding: 16px;
  background: #111727;
  color: #fff;
  border-radius: 8px;
  font-size: 16px;
  font-style: normal;
  line-height: normal;
  transition: all 0.5s;
  cursor: pointer;
}

button.signup-btn:hover,
button.signup-btn:focus,
button.signup-btn:active {
  background: #111727cc;
}


</style>
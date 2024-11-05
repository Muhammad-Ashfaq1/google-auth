<template>
  <!-- <div id="app">
    <button v-if="!token" @click="loginWithGoogle">Log in with Google</button>
    <div v-if="token">
      <h2>Website Performance Check</h2>
      <input type="text" v-model="url" placeholder="Enter website URL" />
      <select v-model="platform">
        <option value="Desktop">Desktop</option>
        <option value="Mobile">Mobile</option>
      </select>
      <button @click="checkPerformance">Check Performance</button>
      <div v-if="performanceScore !== null">
        <h3>Performance Score: {{ performanceScore }}</h3>
      </div>
    </div>
  </div> -->
  <router-view></router-view>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      url: '',
      platform: 'Desktop',
      performanceScore: null,
      token: localStorage.getItem('token'),
    };
  },
  methods: {
    loginWithGoogle() {
      // Redirect to Laravel Google login endpoint
      window.location.href = 'http://localhost:8000/api/auth/google';
    },
    async checkPerformance() {
      if (!this.token) {
        alert('Please log in first!');
        return;
      }
      try {
        const response = await axios.post(
          'http://localhost:8000/api/performance',
          { url: this.url, platform: this.platform },
          { headers: { Authorization: `Bearer ${this.token}` } }
        );
        this.performanceScore = response.data.performance;
      } catch (error) {
        console.error('Error fetching performance score:', error);
      }
    },
  },
  created() {
    // Check URL for token after Google login redirect
    const queryParams = new URLSearchParams(window.location.search);

    if (queryParams.has('token')) {
      if (localStorage.getItem('token') == null || localStorage.getItem('token') == '') {
        this.token = queryParams.get('token');
        localStorage.setItem('token', this.token);

      }
      window.location.href = '/'

      // window.location.reload();
    }

  },
};
</script>


<template>

    <div class="seo-tools">
        <div class="seo-tools__trigger"></div>
        <h1>Google Lighthouse<small></small></h1>
        <div class="seo-tools__container">
            <div class="seo-tools__form">
                <div class="seo-tools__form-label" >URL check</div>
                <select class="seo-tools__protocol" v-model="platform">
                    <option value="Desktop" selected>Desktop</option>
                    <option value="Mobile">Mobile</option>
                </select>
                <div class="seo-tools__input-block">
                    <input type="text" class="seo-tools__input" list="seo-history__datalist"
                        placeholder="Your website URL" v-model="url" />
                    <datalist id="seo-history__datalist" class="seo-history__datalist"></datalist>
                    <div class="seo-tools__message seo-tools__hidden-block"></div>
                </div>

                <button @click="checkPerformance" class="seo-tools__button">Go&nbsp;<i class="fas fa-angle-double-right"></i></button>
            </div>

            <div class="seo-tools__results seo-tools__hidden-block" >
                <h5 class="seo-tools__results-title" >Results for: <i v-if="loading" class="fas fa-spinner"></i></h5>
                Performance Score: {{ performanceScore }}
            </div>
        </div>
    </div>



</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            performanceScore:null,
            url: '',
            platform: 'Desktop',
            token: localStorage.getItem('token'),
            loading: false,
            score: null,
        };
    },
    methods: {
        async checkPerformance() {
            this.loading = true;

            if (!this.token) {
                this.$router.push({ name: 'LoginView' });
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
    }
}
</script>


<style scoped>
/* .seo-tools__results--hidden,
.seo-tools__message--hidden,
.seo-tools__history--hidden,
.seo-tools__hidden-block,
.hidden {
  display: none;
} */

.seo-tools__history-clear {
    float: right;
}

.flexbox,
.seo-tools__results,
.seo-tools__history-item,
.seo-tools__form {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
}

.fa-spinner {
    -webkit-animation: spin 1s linear infinite;
    -moz-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
}

@-moz-keyframes spin {
    100% {
        -moz-transform: rotate(360deg);
    }
}

@-webkit-keyframes spin {
    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

.button,
.seo-tools__history-delete,
.seo-tools__history-run,
.seo-tools__button {
    background: #68d8cc;
    border: 0;
    border-radius: 4px;
    font-size: 1em;
    color: #fff;
    font-weight: bold;
}

.button--warning,
.seo-tools__history-delete {
    background-color: #7e949f;
    color: #e8f0f3;
}

.seo-tools {
    margin: 50px auto;
    padding: 1em;
    width: 50%;
    box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.05);
    border: 1px solid #ccc;
    border-radius: 10px;
}

.seo-tools__bordered-block,
.seo-tools__results,
.seo-tools__form {
    margin: 1em 0;
    padding: 1em;
    border: 2px solid #f7f7f7;
    border-radius: 3px;
    position: relative;
    font-size: 0.875em;
}

.seo-tools__bordered-label,
.seo-tools__results-title,
.seo-tools__form-label {
    position: absolute;
    top: -0.7em;
    left: 1em;
    background: #fff;
    color: #7e949f;
    padding: 0 2em 0 0.5em;
    margin: 0;
    font-size: 1em;
    font-weight: normal;
}

.seo-tools__filled-block,
.seo-tools__history {
    margin: 1em 0;
    background: #f7f7f7;
    padding: 1em 1em;
}

.seo-tools__filled-label,
.seo-tools__history h5 {
    color: #68d8cc;
    font-weight: bold;
    margin: 0 0 0.5em;
    font-size: 1.25em;
}

/* .seo-tools__trigger {
  display: none; 
  position: fixed;
  z-index: 50;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: orange;
} */
/* .seo-tools__hidden-block {
  display: none;
} */
.seo-tools__form {
    position: relative;
}

.seo-tools__protocol {
    padding: 0.75em 1em;
    border-radius: 4px;
    border: 0;
    background: #e8f0f3;
    color: #7e949f;
    font-size: 1em;
    width: 20%;
    display: inline-block;
}

.seo-tools__input-block {
    width: 54%;
    position: relative;
}

.seo-tools__input {
    padding: 0.75em 0.5em 0.75em 1em;
    border-radius: 4px;
    border: 0;
    background: #e8f0f3;
    color: #7e949f;
    font-size: 1em;
    width: 100%;
}

.seo-tools__input::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: rgba(126, 148, 159, 0.75);
}

.seo-tools__input::-moz-placeholder {
    /* Firefox 19+ */
    color: rgba(126, 148, 159, 0.75);
}

.seo-tools__input:-ms-input-placeholder {
    /* IE 10+ */
    color: rgba(126, 148, 159, 0.75);
}

.seo-tools__input:-moz-placeholder {
    /* Firefox 18- */
    color: rgba(126, 148, 159, 0.75);
}

.seo-tools__message {
    position: absolute;
    top: 0.25em;
    right: 0.5em;
    font-size: 0.75em;
    color: #7e949f;
}

.seo-tools__button {
    width: 20%;
}

.seo-tools__history {
    font-size: 0.75em;
}

.seo-tools__history-item {
    margin-bottom: 0.5em;
    align-content: stretch;
}

.seo-tools__history-title {
    flex-basis: 70%;
    text-align: left;
}

.seo-tools__history-run {
    font-size: 0.75em;
}

.seo-tools__history-delete {
    font-size: 0.75em;
}

.seo-tools__results--faded {
    opacity: 0.5;
}

.seo-tools__results ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    font-size: 0.875em;
    text-align: left;
}

.seo-tools__type-title {
    font-size: 0.875em;
    text-align: left;
}
</style>
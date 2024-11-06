# Lighthouse Performance Checker

This project is a full-stack application that utilizes Laravel 11 for the backend API and Vue.js for the frontend. It provides Google-based login functionality and allows users to test website performance using the Google Lighthouse API, returning performance scores for both desktop and mobile platforms.

## Table of Contents
- [Requirements](#requirements)
- [Project Structure](#project-structure)
- [Setup Instructions](#setup-instructions)
    - [1. Backend (Laravel API)](#1-backend-laravel-api)
    - [2. Frontend (Vue.js)](#2-frontend-vuejs)
- [Environment Variables](#environment-variables)
- [API Documentation](#api-documentation)

---

## Requirements

Ensure the following dependencies are installed on your system:
- **PHP**: 8.2 or higher
- **Composer**: 2.7.9
- **Node.js**: Latest stable version
- **MySQL**: Compatible with Laravel 11
- **Laravel**: 11
- **Google Cloud API Key** with access to the PageSpeed Insights API

---

## Project Structure

This repository contains two main directories:
1. **`lighthouse-api`**: Laravel 11 backend API for handling authentication and performance checking.
2. **`lighthouse-vue`**: Vue.js frontend application for user interface and interaction with the backend.

---

## Setup Instructions

### 1. Backend (Laravel API)

#### Step 1: Clone the Repository and Install Dependencies
Clone the repository from GitHub and navigate to the backend directory:

```bash
    git clone git@github.com:Muhammad-Ashfaq1/google-auth.git
    cd lighthouse-api
    composer install
    php artisan passport:client --personal
    php artisan passport:client --password
    php artisan migrate
```

### 2.Frontend (Vue.js)

#### After clone the repository use the following command to setup vue-js

```bash
    npm install
    npm run dev
```
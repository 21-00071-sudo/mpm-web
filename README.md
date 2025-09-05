# DTC-MPM (Digital Transformation Center - Monitoring and Project Management System)

## Table of Contents

-   [Overview](#overview)
-   [Features](#features)
-   [System Architecture](#system-architecture)
-   [Prerequisites](#prerequisites)
-   [Setup Guide](#setup-guide)
    -   [Laragon Setup](#laragon-setup)
    -   [Project Setup](#project-setup)
    -   [Database Setup](#database-setup)
    -   [Start Application](#start-application)

# Overview

A centralized web platform for managing office projects, tasks, and documents. Streamlines collaboration and organization for office staff and student interns at the Digital Transformation Center.

# Features

-   **User Authentication:** Secure login with three role-based access levels.
-   **Project Management:** Create projects with role-based access control.
-   **Task Management:** Manage tasks with document attacment capabilities.
-   **File Management:** Centralized document storage linked to tasks.
-   **Progress Tracking:** Monitoring project and task status(In Progress, Completed, Delayed).

# System Architecture

-   **Frontend:** HTML, Tailwind CSS, JavaScript, Blade(Laravel’s templating engine)
-   **Backend:** Laravel(PHP framework)
-   **Database:** MySQL

# Prerequisites

-   PHP 8.4.11
-   Composer 2.8.10
-   Node.js (22.18.0) and npm
-   MySQL Server

# Setup Guide

### Laragon Setup

1. Download and Extract

    - Download `laragon-setup.rar` from the provided [link](https://drive.google.com/file/d/1vaB29rXovB7327_rFK5HJF1MIfggOCVs/view?usp=sharing)
    - Extract all files

2. Install Laragon
    - Run `laragon-wamp.exe` as administrator
    - Complete installation (don't start yet)
3. Copy Components
    - From the extracted files, copy these folders to Laragon:
        - Copy `httpd-2.4.65-250724-Win64-VS17` to `C:\laragon\bin\apache\`
        - Copy `node-v22.18.0-win-x64` to `C:\laragon\bin\nodejs\`
        - Copy `php-8.4.11-Win32-vs17-x64` to `C:\laragon\bin\php\`
4. Configure Version
    - Open Laragon application
    - Right-click in center area of the Laragon window
    - From the menu that appears:
        - Go to PHP -> select `php-8.4.11-Win32-vs17-x64`
        - Go to Apache -> select `httpd-2.4.65-250724-Win64-VS17`
        - Go to Node.js -> select `node-v22.18.0-win-x64`
5. Start your Development Environment
    - Click **"Start All"** button (bottom left)

### Project Setup

6.  Clone and Setup Laravel Project

-   In Laragon window, click the **Terminal** Button
-   Clone the repository:
    ```sh
    git clone [your-repository-url]
    cd [project-folder-name]
    ```
-   Update Laravel Installer:
    ```sh
    composer global require laravel/installer
    ```
-   Update Composer dependencies:
    ```sh
    composer update
    ```
-   Install NPM packages:
    ```sh
    npm install
    ```

### Database Setup

-   Create MySQL database (click **Database** button in Laragon -> **Open** -> create new database)
-   Create `.env` file and copy contents from `.env.example`
-   Configure database settings `.env` file:
    -   **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME**, (get values from Laragon -> Database)
-   Run database migrations:
    ```sh
    php artisan migrate
    ```
-   Run database seeding(populates tables with initial data):
    ```sh
    php artisan db:seed
    ```
    **Note:** The seeder creates dummy accounts for 3 user roles, plus sample projects and tasks (see `database/seeders/`). For production, consider removing or modifying seeders to avoid preset data, though keeping admin accounts may be acceptable for initial setup.

### Start Application

-   Run the application:

    ```sh
    composer run dev
    ```

-   Wait until you see output similar to:
    ```sh
     ➜  APP_URL: https://mpm-web.test
    ```

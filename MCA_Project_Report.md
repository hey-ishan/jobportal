# ONLINE JOB PORTAL
**A Major Project Report**
Submitted in partial fulfillment of the requirements for the degree of 
**Master of Computer Applications (MCA) - VI Semester**

**Submitted By:**
Mohammed Ishan
[Your Roll Number/Enrollment Number]

**Under the Guidance of:**
[Your Guide Name]

---

## 1. ABSTRACT
The "Online Job Portal" is a comprehensive web-based application designed to bridge the gap between job seekers and employers. In today's competitive job market, finding the right talent and the right job opportunity is a significant challenge. This system provides a unified platform where employers can post job vacancies, manage applications, and search for potential candidates. Conversely, job seekers can create detailed profiles, upload resumes, search for jobs using advanced filters, and apply for positions seamlessly. 

Built using modern web technologies including Laravel 10, PHP 8.3, and MySQL, the system ensures high performance, security, and scalability. The portal includes three main modules: Admin, Employer, and Job Seeker, each tailored with specific functionalities to ensure a smooth recruitment process.

---

## 2. INTRODUCTION
### 2.1 Project Objective
The primary objective of this project is to develop an interactive, fast, and user-friendly job portal. It aims to eliminate the traditional, time-consuming methods of recruitment by automating the job search and hiring process.

### 2.2 Scope of the Project
- **For Job Seekers:** Allows users to register, build professional resumes, search for jobs based on location, skills, and categories, and track their applications.
- **For Employers:** Enables companies to register, post jobs, review applicant profiles, and shortlist candidates.
- **For Administrators:** Provides complete control over the platform, including user management, job moderation, site settings, and SEO configurations.

---

## 3. SYSTEM ANALYSIS
### 3.1 Existing System
In traditional recruitment systems, companies rely on newspaper advertisements or physical bulletin boards. Even existing basic web systems often lack advanced filtering, resume parsing, and proper communication channels between the employer and the applicant.
**Drawbacks of Existing Systems:**
- Time-consuming and manual process.
- Limited reach for job postings.
- Difficulty in filtering out unqualified candidates.

### 3.2 Proposed System
The proposed "Online Job Portal" overcomes these drawbacks by providing:
- Advanced Search Engine (Location, Salary, Experience, Skills).
- Automated email notifications.
- A central dashboard for tracking applications.
- Secure authentication and role-based access control.

---

## 4. SYSTEM REQUIREMENTS
### 4.1 Hardware Requirements
- **Processor:** Intel Core i3 / AMD Ryzen 3 or higher.
- **RAM:** 4 GB (8 GB recommended for development).
- **Storage:** 500 MB of free space.

### 4.2 Software Requirements
- **Operating System:** Windows 10/11, Linux, or macOS.
- **Backend Technology:** PHP 8.3, Laravel 10 Framework.
- **Frontend Technology:** HTML5, CSS3, Bootstrap, JavaScript, jQuery.
- **Database:** MySQL.
- **Local Server:** Laragon / XAMPP.
- **Code Editor:** Visual Studio Code.

---

## 5. SYSTEM ARCHITECTURE & DESIGN
The application follows the **MVC (Model-View-Controller)** architectural pattern, separating the application logic from the user interface.
- **Model:** Manages the data and database interactions (e.g., User, Job, Company models).
- **View:** Displays the data to the user using Blade templating engine.
- **Controller:** Handles user requests, interacts with the model, and renders the appropriate view.

### 5.1 Modules Description
1. **Admin Module:**
   - Dashboard statistics.
   - Manage Users (Seekers & Employers).
   - Manage Jobs and Categories.
   - SEO and Site Settings management.
2. **Employer (Company) Module:**
   - Company Profile management.
   - Post, edit, and delete job listings.
   - View applicants and download resumes.
3. **Job Seeker Module:**
   - Profile and Resume Builder (Education, Experience, Skills).
   - Job Search and Filtering.
   - Apply to jobs and view application history.

*(Note: Insert ER Diagrams and Data Flow Diagrams here)*
![ER Diagram Placeholder](path/to/your/er-diagram.png)
![Data Flow Diagram Placeholder](path/to/your/dfd.png)

---

## 6. IMPLEMENTATION & SCREENSHOTS

### 6.1 Home Page
The landing page featuring a search bar, popular job categories, and featured jobs.
> **[Insert Screenshot: Home Page]**

### 6.2 Job Seeker Dashboard
The dashboard where users can update their resume, view saved jobs, and track applications.
> **[Insert Screenshot: Job Seeker Dashboard]**

### 6.3 Employer Dashboard & Job Posting
The interface for companies to create new job listings with required skills, salary, and expiry dates.
> **[Insert Screenshot: Employer Job Posting]**

### 6.4 Job Search & Filtering Results
The job listing page demonstrating the filtering capabilities (by Country, City, Functional Area).
> **[Insert Screenshot: Search Results]**

### 6.5 Admin Panel
The backend admin interface showing statistics and configuration options.
> **[Insert Screenshot: Admin Dashboard]**

---

## 7. SYSTEM TESTING
Testing is a crucial phase to ensure the system is bug-free and meets the requirements.
- **Unit Testing:** Individual components like the user registration and job posting functions were tested for logic errors.
- **Integration Testing:** Ensuring the application flow works correctly, e.g., an employer posting a job and a seeker successfully applying for it.
- **System Testing:** The entire application was tested on a local Laragon server using various web browsers to ensure cross-browser compatibility and responsiveness.

---

## 8. CONCLUSION & FUTURE ENHANCEMENTS
### 8.1 Conclusion
The "Online Job Portal" was successfully developed and tested. It fulfills the primary goal of connecting job seekers with relevant employers efficiently. The transition to the Laravel 10 framework ensures that the application is secure, maintainable, and ready for modern web standards.

### 8.2 Future Scope
- Integration of an AI-based Resume Parsing system.
- Addition of a real-time Chat application between employers and candidates.
- Implementation of a Video Interview module within the platform.
- Mobile Application development for Android and iOS using APIs.

---

## 9. REFERENCES
1. Laravel Framework Documentation - https://laravel.com/docs
2. PHP Official Documentation - https://www.php.net/docs.php
3. Bootstrap Frontend Toolkit - https://getbootstrap.com/
4. MySQL Reference Manual - https://dev.mysql.com/doc/

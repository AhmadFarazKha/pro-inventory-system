# pro-inventory-system

Full-stack Inventory Management System with PHP, MySQL, and Bootstrap 5.

---

# 💎 AFK Premium Store & Inventory System

### **Owner/Developer:** Ahmad Faraz Khan Niazi

### **Location:** Islamabad, Pakistan (Serving All Over Pakistan 🇵🇰)

### **Contact:** [+92 304 5979885](https://www.google.com/search?q=https://wa.me/923045979885)

---

## 📖 Project Description

The **AFK Premium Store** is a professional full-stack PHP web application designed for modern inventory management and high-end retail. Featuring a  **Glassmorphism UI** , this system is tailored for the Pakistani market, combining automated stock control with direct  **WhatsApp Business integration** . Whether you are in Islamabad, Karachi, Lahore, or anywhere else in Pakistan, this system is built to facilitate seamless nationwide commerce.

---

## 🚀 Key Features

* **Modern Glassmorphism Design:** A premium, translucent UI built with custom CSS and Bootstrap 5.
* **Nationwide Service:** Branding and logic optimized for services across all of Pakistan.
* **Smart Inventory Automation:** Real-time stock deduction immediately upon order placement.
* **WhatsApp Direct-to-Owner:** A dedicated button on every product card that opens a WhatsApp chat with Ahmad Faraz Khan Niazi for instant purchase inquiries.
* **Admin Command Center:** Secure dashboard for tracking global sales and monitoring  **Total Revenue** .
* **Printable Receipts:** Clean, professional order history views that function as digital or physical receipts.

---

## 🏗 System Architecture

The project follows a modular, action-based PHP architecture to ensure high performance and easy maintenance.

1. **Frontend:** Translucent, responsive UI rendered via `catalog.php`.
2. **Logic Layer:** Housed in the `actions/` folder for secure session and transaction handling.
3. **Database Layer:** Robust MySQL backend managing users, products, and order logs.

---

## 📊 Database Schema

The system uses a relational model to ensure data consistency between customers and stock levels.

| **Table**        | **Purpose**                                                  |
| ---------------------- | ------------------------------------------------------------------ |
| **`users`**    | Handles authentication and permissions (`admin`vs `customer`). |
| **`products`** | Manages the digital warehouse, pricing, and stock levels.          |
| **`orders`**   | Tracks every transaction, linking users to specific products.      |

---

## 🛠 Installation & Setup

1. **Clone the Project:**
   **Bash**

   ```
   git clone https://github.com/AhmadFarazKha/pro-inventory-system.git
   ```
2. **Setup Database:**

   * Create a database named `pro_inventory` in phpMyAdmin.
   * Import the provided SQL structure file.
3. **Configure Connection:**

   * Update `config/db.php` with your local host settings (Server, Username, Password).
4. **Add Images:**

   * Store product images in the `/uploads` folder. The filenames must match those saved in your database.

---

## 📞 Order & Contact Info

I provide services and product delivery  **all over Pakistan** . If you are interested in a product or want this system implemented for your business, contact me:

* **Office Location:** Islamabad, Pakistan
* **WhatsApp:** [+92 304 5979885](https://www.google.com/search?q=https://wa.me/923045979885)
* **Availability:** Nationwide Shipping & Support

---

### **Project Folder Structure:**

* `/actions` - Core PHP logic for orders and logout.
* `/config` - Database connection configuration.
* `/partials` - UI components (Header, Footer).
* `/uploads` - Storage for product imagery.
* `catalog.php` - The main customer-facing marketplace.
* `admin_orders.php` - Admin panel for revenue and status tracking.

---

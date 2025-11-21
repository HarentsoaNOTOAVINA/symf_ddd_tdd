# 📚 Hexago Test Project

> A Symfony application built with **Domain-Driven Design (DDD)** and **Test-Driven Development (TDD)** principles.

---

## 📋 Table of Contents

- [Prerequisites](#-prerequisites)
- [Architecture](#-architecture)
- [Installation](#-installation)
- [Testing](#-testing)
- [Key Features](#-key-features)
- [API Usage](#-api-usage)
- [Contributing](#-contributing)

---

## 🛠️ Prerequisites

Before you begin, ensure you have the following installed:

| Tool               | Version       | Required       |
| ------------------ | ------------- | -------------- |
| 🐘 **PHP**         | 8.3 or higher | ✅ Yes         |
| 🎼 **Composer**    | Latest        | ✅ Yes         |
| ⚡ **Symfony CLI** | Latest        | 🟡 Recommended |

---

## 🏗️ Architecture

This project follows a **strict DDD architecture**, separating concerns into distinct layers:

```
📦 src/
├── 🎯 Domain/          # Business logic, entities, interfaces (framework-agnostic)
├── 🔄 Application/     # Use cases, commands, queries, event subscribers
└── 🔌 Infrastructure/  # Controllers, repositories, Symfony integration
```

### Layer Responsibilities

- **🎯 Domain**: Pure business logic with no external dependencies
- **🔄 Application**: Orchestrates domain logic and handles use cases
- **🔌 Infrastructure**: Framework integration and external services

---

## 📥 Installation

### 1️⃣ Clone the repository

```bash
git clone <repository-url>
cd symfony_ddd_tdd
```

### 2️⃣ Install dependencies

```bash
composer install
```

### 3️⃣ Start the development server (optional)

```bash
symfony serve
```

---

## 🧪 Testing

This project uses **PHPUnit** for testing with a **TDD approach**.

### Run all tests

```bash
php bin/phpunit
```

### Test Structure

```
📂 tests/
├── 🎯 Domain/          # Unit tests for entities and domain logic
├── 🔄 Application/     # Unit/Integration tests for use cases
└── 🔌 Infrastructure/  # Integration/Functional tests for controllers
```

### ✅ Current Test Results

- **9 tests**, **23 assertions** - All passing ✅
- Code coverage: Domain logic fully tested

---

## ✨ Key Features

| Feature                        | Description                                                       |
| ------------------------------ | ----------------------------------------------------------------- |
| 🐘 **PHP 8.3**                 | Modern PHP with Enums, Attributes, Constructor Property Promotion |
| ⚡ **Symfony 7**               | Latest stable Symfony framework                                   |
| 🏷️ **Attribute-Based Routing** | Clean routing with PHP attributes                                 |
| 🎯 **DDD Architecture**        | Clean separation of concerns                                      |
| 🧪 **TDD Approach**            | Test-first development                                            |
| 📡 **Event-Driven**            | Domain events with subscribers                                    |

---

## 🚀 API Usage

### Start the server

```bash
symfony serve
```

### Publish a document

**Endpoint:** `POST /api/documents/{id}/publish`

**Example:**

```bash
curl -X POST http://localhost:8000/api/documents/123/publish
```

**Response:**

```json
{
  "status": "success",
  "documentId": "123"
}

```

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. ⭐ **Star this repository** if you find it useful
2. 🐛 **Report bugs** by opening an issue
3. 💡 **Suggest improvements** via pull requests
4. 📖 **Improve documentation**

---

## 📄 License

This project is open source. Feel free to use it for learning purposes.

---

**Made with ❤️ using Symfony, DDD, and TDD principles**

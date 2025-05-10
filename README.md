# Cycle Payments System

A Laravel-based modular payment integration system that dynamically selects and processes payments through configured gateways such as Geidea, NeoLeap, and HyperPay.

## 🚀 Features

- Dynamic selection of active payment gateway
- Extensible design using the Strategy Pattern
- Pre-configured support for:
  - Geidea
  - NeoLeap
  - HyperPay
- Clean separation of concerns using Interfaces and Services
- Laravel Livewire for settings management
- Centralized logging and error responses

## 🏗️ Project Architecture
- `PaymentGatewayController`: Handles payment gateway selection and processing
- `SelectPaymentService`: Dynamically chooses and configures the gateway
- `PaymentContext`: Unified context for executing payment actions
- `PaymentGateways/Payments/`: Gateway-specific implementations
- `PaymentsSeeder`: Seeds sample gateway data


## 🛠️ Setup Instructions
1. **Clone the repository**
   ```bash
   git clone https://github.com/Samuelamin/PaymentGateways.git
   cd cycle-payments
2. **Clone & install**  
   git clone git@github.com:your-org/cycle-payments.git
   cd PaymentGateways
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   php artisan db:seed --class=PaymentsSeeder



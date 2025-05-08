-- Roles
INSERT INTO roles (name, created_at, updated_at) VALUES
('vendedor', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('cliente', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Vendedores
INSERT INTO users (name, email, password, role_id, created_at, updated_at) VALUES
('Juan Pérez', 'juan.perez@empresa.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('María García', 'maria.garcia@empresa.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Clientes
INSERT INTO users (name, email, password, role_id, created_at, updated_at) VALUES
('Carlos López', 'carlos.lopez@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Ana Martínez', 'ana.martinez@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Pedro Ramírez', 'pedro.ramirez@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Laura Torres', 'laura.torres@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Productos
INSERT INTO products (name, description, price, created_at, updated_at) VALUES
('Laptop HP 15"', 'Laptop HP con procesador Intel Core i5, 8GB RAM, 256GB SSD', 799.99, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Monitor Dell 24"', 'Monitor LED Full HD 1080p, 60Hz, HDMI', 199.99, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Teclado Mecánico RGB', 'Teclado gaming con switches Cherry MX, retroiluminación RGB', 89.99, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Mouse Inalámbrico', 'Mouse ergonómico con 6 botones programables, batería recargable', 29.99, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Impresora Multifuncional', 'Impresora láser con escáner y copiadora integrados', 299.99, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
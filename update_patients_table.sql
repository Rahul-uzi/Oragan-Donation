USE donorspot;

-- Add email column if it doesn't exist
ALTER TABLE patients 
ADD COLUMN IF NOT EXISTS email VARCHAR(255) AFTER address;

-- Add status column to patients table
ALTER TABLE patients
ADD COLUMN IF NOT EXISTS status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending';

-- Create notifications table
CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    donor_id INT,
    organ_needed VARCHAR(50),
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (donor_id) REFERENCES donors(id)
); 
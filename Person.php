<?php
class Person {
    // Properti / atribut
    public string $firstname;
    public string $lastname;
    public string $phone;
    public string $address;

    // Constructor: dipanggil saat object dibuat
    public function __construct(
        string $firstname,
        string $lastname,
        string $phone,
        string $address
    ) {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->address   = $address;
    }

    // Method untuk mendapatkan nama lengkap
    public function getFullName(): string {
        return $this->firstname . ' ' . $this->lastname;
    }
}
?>
<?php

class Contact
{
  private Database $db;

  function __construct()
  {
    $this->db = Database::get_db();
  }

  function get_contacts()
  {
    return $this->db->query_select("SELECT * FROM contacts");
  }

  function create_contact(mixed $data)
  {
    $query = "INSERT INTO contacts (name, email, message) VALUES (:contact_name, :contact_email, :contact_message)";

    $this->db->query_create($query, $data);
  }

  function update_contact(mixed $data)
  {
    $query = 'UPDATE contacts SET name=:name, email=:email, message=:message WHERE id=:id';

    $this->db->query_update($query, $data);
  }

  function delete_contact(string $id)
  {
    $query = 'DELETE FROM contacts WHERE id=' . $id;

    $this->db->query_delete($query);
  }
}

$contact = new Contact();

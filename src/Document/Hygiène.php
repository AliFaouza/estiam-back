<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Hygiène {
 
 #[MongoDB\Id]
 protected $id;
 
 
 #[MongoDB\EmbedOne(targetDocument: Controle_sanitaire::class)]
 private $fields;
 
 #[MongoDB\Field(type: 'collection')]
 private array $geometry = [];
 
 public function getId(): string {
 return $this->id;
 }
 public function getFields() {
 return $this->fields;
 }
 public function setId(string $id): void {
 $this->id = $id;
 }
 public function setFields(Controle_sanitaire $fields): void {
 $this->fields = $fields;
 }
 public function getGeometry(): array {
 return $this->geometry;
 }
 public function setGeometry(array $geometry): void {
 $this->geometry = $geometry;
 }
}

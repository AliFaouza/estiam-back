<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Controle_sanitaire{

    #[MongoDB\Field(type:'string')]
    private $ods_type_activite;

    #[MongoDB\Field(type:'string')]
    private $app_libelle_activite_etablissement;

    #[MongoDB\Field(type:'string')]
    private $libelle_commune;

    #[MongoDB\Field(type:'integer')]
    private $siret;

    #[MongoDB\Field(type:'string')]
    private $app_libelle_etablissement;

    #[MongoDB\Field(type:'integer')]
    private $numero_inspection;

    #[MongoDB\Field(type:'collection')]
    private array $geores = [];

    #[MongoDB\Field(type:'string')]
    private $filtre;

    #[MongoDB\Field(type:'bin_bytearray')]
    private $date_inspection;

    #[MongoDB\Field(type:'integer')]
    private $code_postal;

    #[MongoDB\Field(type:'string')]
    private $synthese_eval_sanit;

    #[MongoDB\Field(type:'string')]
    private $adresse_2_ua;

    public function getOdsTypeActivite() {
        return $this->ods_type_activite;
    }
    public function setOdsTypeActivite() {
        $this->ods_type_activite = $ods_type_activite;
    }

    public function getAppLibelleActiviteEtablissement() {
        return $this->app_libelle_activite_etablissement;
    }
    public function setAppLibelleActiviteEtablissement(): void {
        $this->app_libelle_activite_etablissement = $app_libelle_activite_etablissement;
    }

    public function getLibelleCommune() {
        return $this->libelle_commune;
    }
    public function setLibelleCommune() {
        $this->libelle_commune = $libelle_commune;
    }

    public function getSiret() {
        return $this->siret;
    }
    public function setSiret() {
        $this->siret = $siret;
    }

    public function getsetAppLibelleEtablissement() {
        return $this->app_libelle_etablissement;
    }
    public function setAppLibelleEtablissement() {
        $this->app_libelle_etablissement = $app_libelle_etablissement;
    }

    public function getNumeroInspection() {
        return $this->numero_inspection;
    }
    public function setNumeroInspection() {
        $this->numero_inspection = $numero_inspection;
    }

    public function getGeores(): array {
        return $this->geores;
    }
    public function setGeores(array $geores): void {
        $this->geores = $geores;
    }

    public function getFiltre() {
        return $this->filtre;
    }
    public function setFiltre() {
        $this->filtre = $filtre;
    }

    public function getDateInspection() {
        return $this->date_inspection;
    }
    public function setDateInspection() {
        $this->date_inspection = $date_inspection;
    }

    public function getCodePostal() {
        return $this->code_postal;
    }
    public function setCodePostal() {
        $this->code_postal = $code_postal;
    }

    public function getSyntheseEvalSanit() {
        return $this->synthese_eval_sanit;
    }
    public function setSyntheseEvalSanit() {
        $this->synthese_eval_sanit = $synthese_eval_sanit;
    }

    public function getAdresse() {
        return $this->adresse_2_ua;
    }
    public function setAdresse() {
        $this->adresse_2_ua = $adresse_2_ua;
    }
}
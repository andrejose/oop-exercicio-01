<?php

// Define a codificação da página
header('Content-Type: text/html; charset=utf-8');

// Cria a classe referente a Cliente
class Cliente 
{
	// Define os atributos da classe
	public $id;
	public $nome;
	public $cpf;
	public $endereco;
	public $cidade;
	public $uf;

	// Método construtor
	public function __construct($id, $nome, $cpf, $endereco, $cidade, $uf){

		// Define os valores dos atributos do objeto instanciado
		$this->id = $id;
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->endereco = $endereco;
		$this->cidade = $cidade;
		$this->uf = $uf;

	}

}

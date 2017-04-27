<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\Repositories\OrderRepository;
use Illuminate\Http\Request;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class PagSeguroController extends Controller
{
	/**
	 * Ao final do pagamento o cliente é redirecionado para este end-point
	 * http://localhost:8080/retorno-pagseguro
	 *
	 * Comprador de Teste
	 * Email: c05883669321348108367@sandbox.pagseguro.com.br
	 * Senha: WJr3lextW8N7Hn8y
	 * CV do Cartão = 123
	 *
	 * @param null $transaction_id
	 * @return string
	 */
	public function retorno(Request $request, Locator $locator, OrderRepository $orderModel) {
		/*
		 * Status PagSeguro
		1	Aguardando pagamento: o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.
		2	Em análise: o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.
		3	Paga: a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.
		4	Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.
		5	Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.
		6	Devolvida: o valor da transação foi devolvido para o comprador.
		7	Cancelada: a transação foi cancelada sem ter sido finalizada.
		*/
		$transaction_id = $request->get('transaction_id');
		$transaction = $locator->getByCode($transaction_id);
		$statusCode = $transaction->getDetails()->getStatus();

		//TODO: Improvements: 1. Check if order exists, 2. Check Status ID
		if ($statusCode == 3) {
			$orderID = $transaction->getDetails()->getReference();
			$order = $orderModel->find($orderID);
			$order->status_id = 2; //Payment Received
			$order->save();
		}

		return redirect()->route('account.orders');
    }

	/**
	 * O sistema seja avisado sempre que uma transação muda de estado
	 * http://localhost:8080/notificacao-transacoes
	 *
	 * @return string
	 */
	public function notificacao() {
		header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
		return 'teste notificacao';
    }
}

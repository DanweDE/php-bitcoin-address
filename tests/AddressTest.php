<?php

namespace Danwe\Bitcoin\Tests;

use \Danwe\Bitcoin\Address;

/**
 * @since 1.0.0
 * @author Daniel A. R. Werner
 *
 * Data from the official bitcoin client:
 * https://github.com/bitcoin/bitcoin/tree/master/src/test/data
 */
class AddressTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider validAddressesProvider
	 */
	public function testConstruction( $address, $addressString ) {
		$this->assertInstanceOf( 'Danwe\\Bitcoin\\Address', $address,
			$addressString . ' is being recognized as a valid address.' );
	}

	/**
	 * @dataProvider invalidAddressesProvider
	 *
	 * @expectedException \Exception
	 */
	public function testConstructionWithInvalidAddressString( $invalidAddressString ) {
		new Address( $invalidAddressString );
	}

	/**
	 * @return array( array( Address $address, string $addressString ), ... )
	 */
	public function validAddressesProvider() {
		return array_map(
			function( $addressString ) {
				return [
					new Address( $addressString ),
					$addressString
				];
			}, [
				'1AGNa15ZQXAZUgFiqJ2i7Z2DPU2J6hW62i',
				'1Ax4gZtb7gAit2TivwejZHYtNNLT18PUXJ',
				'1C5bSj1iEGUgSTbziymG7Cn18ENQuT36vv',
				'1Gqk4Tv79P91Cc1STQtU3s1W6277M2CVWu',
				'1JwMWBVLtiqtscbaRHai4pqHokhFCbtoB4',
				'19dcawoKcZdQz365WpXWMhX6QCUpR9SY4r',
				'13p1ijLwsnrcuyqcTvJXkq2ASdXqcnEBLE'
			]
		);
	}

	/**
 	 * @return array( array( string $addressString ), ... )
	 */
	public function invalidAddressesProvider() {
		return array_chunk ( [
			'',
			'42',
			'foo',
			'x',
			'37qgekLpCCHrQuSjvX3fs496FWTGsHFHizjJAs6NPcR47aefnnCWECAhHV6E3g4YN7u7Yuwod5Y',
			'dzb7VV1Ui55BARxv7ATxAtCUeJsANKovDGWFVgpTbhq9gvPqP3yv',
			'MuNu7ZAEDFiHthiunm7dPjwKqrVNCM3mAz6rP9zFveQu14YA8CxExSJTHcVP9DErn6u84E6Ej7S',
			'rPpQpYknyNQ5AEHuY6H8ijJJrYc2nDKKk9jjmKEXsWzyAQcFGpDLU2Zvsmoi8JLR7hAwoy3RQWf',
			'4Uc3FmN6NQ6zLBK5QQBXRBUREaaHwCZYsGCueHauuDmJpZKn6jkEskMB2Zi2CNgtb5r6epWEFfUJq',
			'7aQgR5DFQ25vyXmqZAWmnVCjL3PkBcdVkBUpjrjMTcghHx3E8wb',
			'17QpPprjeg69fW1DV8DcYYCKvWjYhXvWkov6MJ1iTTvMFj6weAqW7wybZeH57WTNxXVCRH4veVs',
			'KxuACDviz8Xvpn1xAh9MfopySZNuyajYMZWz16Dv2mHHryznWUp3',
			'7nK3GSmqdXJQtdohvGfJ7KsSmn3TmGqExug49583bDAL91pVSGq5xS9SHoAYL3Wv3ijKTit65th',
			'cTivdBmq7bay3RFGEBBuNfMh2P1pDCgRYN2Wbxmgwr4ki3jNUL2va',
			'gjMV4vjNjyMrna4fsAr8bWxAbwtmMUBXJS3zL4NJt5qjozpbQLmAfK1uA3CquSqsZQMpoD1g2nk',
			'emXm1naBMoVzPjbk7xpeTVMFy4oDEe25UmoyGgKEB1gGWsK8kRGs',
			'7VThQnNRj1o3Zyvc7XHPRrjDf8j2oivPTeDXnRPYWeYGE4pXeRJDZgf28ppti5hsHWXS2GSobdqyo',
			'1G9u6oCVCPh2o8m3t55ACiYvG1y5BHewUkDSdiQarDcYXXhFHYdzMdYfUAhfxn5vNZBwpgUNpso',
			'31QQ7ZMLkScDiB4VyZjuptr7AEc9j1SjstF7pRoLhHTGkW4Q2y9XELobQmhhWxeRvqcukGd1XCq',
			'DHqKSnpxa8ZdQyH8keAhvLTrfkyBMQxqngcQA5N8LQ9KVt25kmGN',
			'2LUHcJPbwLCy9GLH1qXmfmAwvadWw4bp4PCpDfduLqV17s6iDcy1imUwhQJhAoNoN1XNmweiJP4i',
			'7USRzBXAnmck8fX9HmW7RAb4qt92VFX6soCnts9s74wxm4gguVhtG5of8fZGbNPJA83irHVY6bCos',
			'1DGezo7BfVebZxAbNT3XGujdeHyNNBF3vnficYoTSp4PfK2QaML9bHzAMxke3wdKdHYWmsMTJVu',
			'2D12DqDZKwCxxkzs1ZATJWvgJGhQ4cFi3WrizQ5zLAyhN5HxuAJ1yMYaJp8GuYsTLLxTAz6otCfb',
			'8AFJzuTujXjw1Z6M3fWhQ1ujDW7zsV4ePeVjVo7D1egERqSW9nZ',
			'163Q17qLbTCue8YY3AvjpUhotuaodLm2uqMhpYirsKjVqnxJRWTEoywMVY3NbBAHuhAJ2cF9GAZ',
			'2MnmgiRH4eGLyLc9eAqStzk7dFgBjFtUCtu',
			'461QQ2sYWxU7H2PV4oBwJGNch8XVTYYbZxU',
			'2UCtv53VttmQYkVU4VMtXB31REvQg4ABzs41AEKZ8UcB7DAfVzdkV9JDErwGwyj5AUHLkmgZeobs',
			'cSNjAsnhgtiFMi6MtfvgscMB2Cbhn2v1FUYfviJ1CdjfidvmeW6mn',
			'gmsow2Y6EWAFDFE1CE4Hd3Tpu2BvfmBfG1SXsuRARbnt1WjkZnFh1qGTiptWWbjsq2Q6qvpgJVj',
			'nksUKSkzS76v8EsSgozXGMoQFiCoCHzCVajFKAXqzK5on9ZJYVHMD5CKwgmX3S3c7M1U3xabUny',
			'L3favK1UzFGgdzYBF2oBT5tbayCo4vtVBLJhg2iYuMeePxWG8SQc',
			'7VxLxGGtYT6N99GdEfi6xz56xdQ8nP2dG1CavuXx7Rf2PrvNMTBNevjkfgs9JmkcGm6EXpj8ipyPZ',
			'2mbZwFXF6cxShaCo2czTRB62WTx9LxhTtpP',
			'dB7cwYdcPSgiyAwKWL3JwCVwSk6epU2txw',
			'HPhFUhUAh8ZQQisH8QQWafAxtQYju3SFTX',
			'4ctAH6AkHzq5ioiM1m9T3E2hiYEev5mTsB',
			'Hn1uFi4dNexWrqARpjMqgT6cX1UsNPuV3cHdGg9ExyXw8HTKadbktRDtdeVmY3M1BxJStiL4vjJ',
			'Sq3fDbvutABmnAHHExJDgPLQn44KnNC7UsXuT7KZecpaYDMU9Txs',
			'6TqWyrqdgUEYDQU1aChMuFMMEimHX44qHFzCUgGfqxGgZNMUVWJ',
			'giqJo7oWqFxNKWyrgcBxAVHXnjJ1t6cGoEffce5Y1y7u649Noj5wJ4mmiUAKEVVrYAGg2KPB3Y4',
			'cNzHY5e8vcmM3QVJUcjCyiKMYfeYvyueq5qCMV3kqcySoLyGLYUK',
			'37uTe568EYc9WLoHEd9jXEvUiWbq5LFLscNyqvAzLU5vBArUJA6eydkLmnMwJDjkL5kXc2VK7ig',
			'EsYbG4tWWWY45G31nox838qNdzksbPySWc',
			'nbuzhfwMoNzA3PaFnyLcRxE9bTJPDkjZ6Rf6Y6o2ckXZfzZzXBT',
			'cQN9PoxZeCWK1x56xnz6QYAsvR11XAce3Ehp3gMUdfSQ53Y2mPzx',
			'1Gm3N3rkef6iMbx4voBzaxtXcmmiMTqZPhcuAepRzYUJQW4qRpEnHvMojzof42hjFRf8PE2jPde',
			'2TAq2tuN6x6m233bpT7yqdYQPELdTDJn1eU',
			'ntEtnnGhqPii4joABvBtSEJG6BxjT2tUZqE8PcVYgk3RHpgxgHDCQxNbLJf7ardf1dDk2oCQ7Cf',
			'Ky1YjoZNgQ196HJV3HpdkecfhRBmRZdMJk89Hi5KGfpfPwS2bUbfd',
			'2A1q1YsMZowabbvta7kTy2Fd6qN4r5ZCeG3qLpvZBMzCixMUdkN2Y4dHB1wPsZAeVXUGD83MfRED'
		], 1 );
	}


}

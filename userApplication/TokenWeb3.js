var myContractAddress = '0xd7d60c48c5b0e70841c99bf4bb3549c8c1732812';
var myAbi = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "_who",
				"type": "address"
			}
		],
		"name": "completeMatching",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_who",
				"type": "address"
			}
		],
		"name": "counsel",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_teacher",
				"type": "address"
			},
			{
				"name": "_score",
				"type": "uint256"
			}
		],
		"name": "evaluate",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "inqueryInfo",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "kill",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "newMember",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": false,
				"name": "_who",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "_value",
				"type": "uint256"
			}
		],
		"name": "Receive",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": false,
				"name": "_who",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "_value",
				"type": "uint256"
			}
		],
		"name": "Use",
		"type": "event"
	},
	{
		"inputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_price",
				"type": "uint256"
			}
		],
		"name": "useItem",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getUserToken",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
];

$(document).ready(function(){
	function getUserToken(){

		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.getUserToken(function(err, result){
					alert(result);
				});
			}
		});
	}

	function getUserAccount(){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				alert(myAccount);
				return myAccount;
			}
		});
	}

	function newMember(){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.newMember.sendTransaction({
					from: myAccount,
				}, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert(transactionHash);
					}
				});
			}
		});
	}

	function buyItem(cost){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.useItem.sendTransaction(cost, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert(transactionHash);
					}
				});
			}
		});
	}

	function viewContact(){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.inqueryInfo.sendTransaction({
					from:myAccount,
				}, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert(transactionHash);
					}
				});
			}
		});
	}

	function reward(address,type){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				if(type=="completeMatching"){
					message.completeMatching.sendTransaction(address, function(error, transactionHash) {
						if(error) {
							alert(error);
						}else {
							alert(transactionHash);
						}
					});
				}
				else if(type == "counsel"){
					message.counsel.sendTransaction(address, function(error, transactionHash) {
						if(error) {
							alert(error);
						}else {
							alert(transactionHash);
						}
					});
				}

			}
		});
	}

	function review(address,score){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("Install Metamask!!");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert("error");
			}
			else if (accounts.length == 0) {
				alert("MetaMask is locked");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.evaluate.sendTransaction(address,score, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert(transactionHash);
					}
				});

			}
		});
	}

	window.getUserToken = getUserToken;
	window.getUserAccount = getUserAccount;
	window.newMember = newMember;
	window.buyItem = buyItem;
	window.viewContact = viewContact;
	window.reward = reward;
	window.review = review;

});

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

	function checkUsable(itemName, tokenNum){
		var contractAddress = myContractAddress;
		var abi = myAbi;
		var message;
		var myAccount;

		if (typeof web3 !== 'undefined') {
			web3 = new Web3(web3.currentProvider);
		} else {
			alert("MetaMask를 설치해주세요.");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert(err);
			}
			else if (accounts.length == 0) {
				alert("MetaMask 로그인을 해주세요.");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				message = web3.eth.contract(abi).at(contractAddress);

				message.getUserToken(function(err, result){
					if(itemName != "today_submit" && result < tokenNum){
						alert("코인이 부족합니다.");
					}
					else if (itemName == "today_submit"){
						if (Number(document.getElementById("today_text").value) > result){
							alert("코인이 부족합니다.");
						} else {
							alert(""+itemName+" 체크를 성공하였습니다.");
							document.getElementById(itemName).disabled = false;
						}
					}
					else{
						alert(""+itemName+" 체크를 실패하였습니다.");
						document.getElementById(itemName).disabled = false;
					}
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
			alert("MetaMask를 설치해주세요.");
		}

		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				alert(err);
			}
			else if (accounts.length == 0) {
				alert("MetaMask 로그인을 해주세요.");
			}
			else {
				myAccount = accounts[0];
				web3.eth.defaultAccount = myAccount;

				var inputAccount = document.getElementById("key").value;

				if (myAccount == inputAccount.toLowerCase()){
					document.getElementById("check").value = 1;
					alert("Key Check를 성공하였습니다.");
				}
				else{
					document.getElementById("check").value = 0;
					alert("Key Check를 실패하였습니다.");
				}
			}
		});
	}

	window.getUserAccount = getUserAccount;
	window.checkUsable = checkUsable;

});

function getUserAccountLogin(){
	var contractAddress = myContractAddress;
	var abi = myAbi;
	var message;
	var myAccount;

	if (typeof web3 !== 'undefined') {
		web3 = new Web3(web3.currentProvider);
	} else {
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
		}
		else {
			myAccount = accounts[0];
			web3.eth.defaultAccount = myAccount;

			document.getElementById("metamask").value = String(myAccount);
		}
	});
}

function getUserToken(){
	var contractAddress = myContractAddress;
	var abi = myAbi;
	var message;
	var myAccount;

	if (typeof web3 !== 'undefined') {
		web3 = new Web3(web3.currentProvider);
	} else {
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
		}
		else {
			myAccount = accounts[0];
			web3.eth.defaultAccount = myAccount;

			message = web3.eth.contract(abi).at(contractAddress);

			message.getUserToken(function(err, result){
				var string = document.getElementById("myCoin").innerHTML;
				var replacedString = string.replace("", result);
				document.getElementById("myCoin").innerHTML = replacedString;
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
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
		}
		else {
			myAccount = accounts[0];
			web3.eth.defaultAccount = myAccount;

			message = web3.eth.contract(abi).at(contractAddress);

			if(type=="matching"){
				message.completeMatching.sendTransaction(address, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert("트랜잭션: " + transactionHash);
						location.href="Requests.php";
					}
				});
			}
			else if(type == "counseling"){
				message.counsel.sendTransaction(address, function(error, transactionHash) {
					if(error) {
						alert(error);
					}else {
						alert("트랜잭션: " + transactionHash);
						location.href="Requests.php";
					}
				});
			}

		}
	});
}

function viewContact(pageNum){
	var contractAddress = myContractAddress;
	var abi = myAbi;
	var message;
	var myAccount;

	if (typeof web3 !== 'undefined') {
		web3 = new Web3(web3.currentProvider);
	} else {
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
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
					alert("트랜잭션: " + transactionHash);
					location.href="clickedPublicUser.php?"+pageNum;
				}
			});
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
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
		}
		else {
			myAccount = accounts[0];
			web3.eth.defaultAccount = myAccount;

			message = web3.eth.contract(abi).at(contractAddress);

			message.evaluate.sendTransaction(address,score, function(error, transactionHash) {
				if(error) {
					alert(error);
				}else {
					alert("트랜잭션: " + transactionHash);
					location.href="MyPage_matched.php";
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
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
		}
		else {
			myAccount = accounts[0];
			web3.eth.defaultAccount = myAccount;

			message = web3.eth.contract(abi).at(contractAddress);

			message.useItem.sendTransaction(cost, function(error, transactionHash) {
				if(error) {
					alert(error);
				}else {
					alert("트랜잭션: " + transactionHash);
					location.href="MyPage_coin.php";
				}
			});
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
		alert("MetaMask를 설치해주세요.");
	}

	web3.eth.getAccounts(function(err, accounts){
		if (err != null) {
			alert(err);
		}
		else if (accounts.length == 0) {
			alert("MetaMask 로그인을 해주세요.");
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
					alert("트랜잭션: " + transactionHash);

		      location.href="../index.html";
				}
			});
		}
	});
}

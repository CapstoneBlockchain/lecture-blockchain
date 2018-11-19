//document.write("<script type='text/javascript' src='../web3.js/dist/web3.js'><"+"/script>");
document.write("<script src='https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js'></script>");

var contractAddress = '0xd7d60c48c5b0e70841c99bf4bb3549c8c1732812';
var abi = [
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
var message;

if (typeof web3 !== 'undefined') {
  web3 = new Web3(web3.currentProvider);
} else {
  alert("Install Metamask!!");
}

var myAccount;
web3.eth.getAccounts(function(err, accounts){
      if (err != null) {
        alert("error");
      }
      else if (accounts.length == 0) {
        alert("MetaMask is locked");
      }
      else {
        myAccount = accounts[0];
        alert("계정 : "+accounts[0]);
        web3.eth.defaultAccount = myAccount;

        message = web3.eth.contract(abi).at(contractAddress);
        message.newMember.sendTransaction({
            from: myAccount,
        }, function(error, transactionHash) {
            if(error) {
                alert(error);
            }else {
                alert(transactionHash);

                // message.getUserToken(function(err, result){
                //   alert(result);
                // });
            }
        });
      }
});


alert("finish");

pragma solidity ^0.4.24;

import "zeppelin-solidity/contracts/math/SafeMath.sol";

contract LectureCoin {
    using SafeMath for uint256;
    
    address creator;
    mapping(address => uint256) userTokens;
    
    uint256 constant INIT_TOKEN = 10;
    
    uint256 constant QUERY_COST = 1;
    
    uint256 constant MATCH_REWARD = 2;
    uint256 constant COUNSEL_REWARD = 2;
    uint256 constant EVAL_REWARD = 5;
    
    // constructor
    constructor() public {
        creator = msg.sender;
    }
    
    // LectureCoin Interfaces
    
    event Receive(address _who, uint256 _value);
    event Use(address _who, uint256 _value);
    
    function newMember() public {
        userTokens[msg.sender] = INIT_TOKEN;
        
        emit Receive(msg.sender, INIT_TOKEN);
    }
    
    function inqueryInfo() public {
        require(userTokens[msg.sender] >= QUERY_COST);
        
        userTokens[msg.sender] = userTokens[msg.sender].sub(QUERY_COST);

        emit Use(msg.sender, QUERY_COST);
    }
    
    function completeMatching(address _who) public {
        userTokens[msg.sender] = userTokens[msg.sender].add(MATCH_REWARD);
        userTokens[_who] = userTokens[_who].add(MATCH_REWARD);
        
        emit Receive(msg.sender, MATCH_REWARD);
        emit Receive(_who, MATCH_REWARD);
    }
    
    function counsel(address _who) public {
        userTokens[msg.sender] = userTokens[msg.sender].add(COUNSEL_REWARD);
        userTokens[_who] = userTokens[_who].add(COUNSEL_REWARD);
        
        emit Receive(msg.sender, COUNSEL_REWARD);
        emit Receive(_who, COUNSEL_REWARD);
    }
    
    function useItem(uint256 _price) public {
        require(userTokens[msg.sender] >= _price);
        
        userTokens[msg.sender] = userTokens[msg.sender].sub(_price);
        
        emit Use(msg.sender, _price);
    }
    
    function evaluate(address _teacher, uint256 _score) public {
        require(_score >= 0 && _score <= 5);
        
        userTokens[msg.sender] = userTokens[msg.sender].add(EVAL_REWARD);
        userTokens[_teacher] = userTokens[_teacher].add(_score);
        
        emit Receive(msg.sender, EVAL_REWARD);
        emit Receive(_teacher, _score);
    }
    
    function getUserToken() public view returns (uint256) {
        return userTokens[msg.sender];
    }
    
    function kill() public {
        if (msg.sender == creator) {
            selfdestruct(creator);
        }
    }
}
